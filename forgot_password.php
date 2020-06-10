<?php $currentPage = "Passowrd Recovery"; ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("config.php");
require_once("includes/functions.php");?>

<?php $con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
} ?>

    <div class="container">
        <div class="content">
            <h2 class="heading" style="font-family: Arial, Helvetica, sans-serif; margin-top:50px;">Password Recovery</h2> <br>


            <?php

                if(isset($_POST['password_recovery'])) {
                    $user_name = $_POST['UserName'];
                    $user_email = $_POST['UserEmail'];
                  

                
                
        $query= $con->prepare("SELECT * FROM userdata WHERE UserName = '$user_name' AND UserEmail = '$user_email' AND is_active = 1");    
        $query->execute(); 
        $query->store_result();
      
        if($query->num_rows == 0) exit('User Not Found');



        
        while($query->fetch()){
            if(isset($_COOKIE['_unp_'])) {
                echo "<div class='forgot'>We already sended the link to reset your 
                account passsword. Next request is possible only after 4 minutes. Thank You</div>";  
 
                }

            if(!isset($_COOKIE['_unp_'])) {


                date_default_timezone_set("asia/singapore");

                $mail->addAddress($_POST['UserEmail']);
                $token = getToken(32);
                $encode_token = base64_encode(urlencode($token));
                $email = base64_encode(urlencode($_POST['UserEmail']));

                $expire_date = date("Y-m-d H:i:s", time() + 60 * 2);
                $expire_date = base64_encode(urlencode($expire_date));   

                $queryt = "UPDATE userdata SET validation_key = '$token' WHERE UserName = '$user_name' AND UserEmail = '$user_email' AND is_active = 1";
                $mail->Subject = "Password reset request";
                $mail->Body = "
                                            <h2>Follow the following link to reset password</h2>
                                            <a href='https://localhost/STI-Project-Group-5/new_password.php?eid={$email}&token={$encode_token}&exd={$expire_date}'>Click here to create new password</a>
                                            <p>This link will expire in 2 minutes.
                                            The expired link will redirect to home page</p>                    ";
            
                if($mail->send()) {
                    setcookie('_unp_', getToken(32), time() + 60 * 4, '', '', '', true);
                    echo "<div class='notification'>Check your email for password reset link</div>";
                }

                }
            }
        }
    
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Password Recovery</title>      
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login1.css">
    <link rel="stylesheet" href="css/login2.css">
</head>
<div class="limiter ">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Reset Your Password
					</span>
    </div>
    
    <div class="login100-form validate-form">
    <form action="" method="POST">
            <h2 class="sr-only"></h2>
           
            <div class="wrap-input100 validate-input m-b-26"><input type="text" class="input100" placeholder="Username" name="UserName" required ></div>
            <div class="wrap-input100 validate-input m-b-26"><input type="email" class="input100" placeholder="Email address" name="UserEmail"></div>
            <div class="login100-form-btn"><button type="submit" name="password_recovery">Recover Password</button></div><br>
            <a href="login.php" class="login100-form-btn">Cancel</a>
           <br>
    </div>
</div>						
