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
            <h2 class="heading">Password Recovery</h2>

            <?php

                if(isset($_POST['password_recovery'])) {
                    $user_name = $_POST['UserName'];
                    $user_email = $_POST['UserEmail'];
                  

                
                
        $query= $con->prepare("SELECT * FROM userdata WHERE UserName = '$user_name' AND UserEmail = '$user_email' AND is_active = 1");    
        $query->execute(); 
        $query->store_result();
      
        if($query->num_rows == 0) exit('User Not Found');




        while($query->fetch()){

            if(!isset($_COOKIE['_unp_'])) {
                $user_name = ($_POST['UserName']);
                $user_email = ($_POST['UserEmail']);


                date_default_timezone_set("asia/singapore");
                

                $mail->addAddress($_POST['UserEmail']);
                $token = getToken(32);
                $encode_token = base64_encode(urlencode($token));
                $email = base64_encode(urlencode($_POST['UserEmail']));

                $expire_date = date("Y-m-d H:i:s", time() + 60 * 20);
                $expire_date = base64_encode(urlencode($expire_date));   

                $queryt = "UPDATE userdata SET validation_key = '$token' WHERE UserName = '$user_name' AND UserEmail = '$user_email' AND is_active = 1";
                $mail->Subject = "Password reset request";
                $mail->Body = "
                                            <h2>Follow the following link to reset password</h2>
                                            <a href='localhost/STI-Project-Group-5/new_password.php?eid={$email}&token={$encode_token}&exd={$expire_date}'>Click here to create new password</a>
                                            <p>This link will expire in 2 minutes.
                                            The expired link will redirect to home page</p>
                                            
                                            ";
            
                if($mail->send()) {
                    setcookie('_unp_', getToken(32), time() + 60 * 20, '', '', '', true);
                    echo "<div class='notification'>Check your email for password reset link</div>";
                }
                else {
                        echo "<div class='notification'>You must be wait at lest 20 minutes for another request</div>";
                        }  
    //starts listing the 
    


            

                }
            }
        }

            ?>

            <!--<div class='notification'>You need to wait at lest 20 minutes for another request</div>-->
            <form action="" method="POST" class="color">
                <div class="input-box">
                    <input type="text" class="input-control" placeholder="Username" name="UserName" required>
                </div>
                <div class="input-box">
                    <input type="email" class="input-control" placeholder="Email address" name="UserEmail" required>
                </div>
                <div class="input-box">
                    <input type="submit" class="input-submit" value="RECOVER PASSWORD" name="password_recovery">
                </div>
            </form>
        </div>
    </div>