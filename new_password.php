<?php ob_start(); ?>
<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Password</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <h2 class="heading">New Password</h2>


            <?php
            if(!isset($_GET['eid']) && !isset($_GET['token']) && !isset($_GET['exd'])) {
                header("Location: index.php");
            }else {

                if(isset($_GET['eid']) && isset($_GET['token']) && isset($_GET['exd'])) {

                    $user_email = urldecode(base64_decode($_GET['eid']));
                    $validation_key = urldecode(base64_decode($_GET['token']));
                    $expire_date = urldecode(base64_decode($_GET['exd']));

                    


                    

                    
                    date_default_timezone_set("asia/singapore");
                    $current_date = date("Y-m-d H:i:s");

                    if($expire_date <= $current_date) {
                        echo "<div class='notification'>Sorry This is an expired link. Please submit another request for new password reset link.</div>";
                    } else {
                        $check = true;
                        if(isset($_POST['submit'])) {
                            
                            $user_pass = $_POST['new-password'];
                            $user_con_pass = $_POST['confirm-new-password'];
                            

                            
            
                            if($user_pass == $user_con_pass) {
                                //password validation
                                $pattern_up = "/^.*(?=.{4,56})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/";
                                if(!preg_match($pattern_up, $user_pass)) {
                                    $errPass = "Must be at lest 4 character long, 1 upper case, 1 lower case letter and 1 number exist";
                                }
                            } else {
                                $errPass = "Password dosen't matched";
                                
                                

                            }

                           if(!isset($errPass)) {
                            $query = "SELECT * FROM userdata WHERE UserEmail = '$user_email' AND is_active = 1";
                            $query_con = mysqli_query($connection, $query);
                            if(!$query_con) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                           
                            $user_pass=hash('sha256',$_POST['new-password']);

                            if(mysqli_num_rows($query_con) == 1) {
                                
                                $query1 = "UPDATE userdata SET LoginPassword = '$user_pass' WHERE UserEmail = '$user_email' AND is_active = 1";
                                $query_con1 = mysqli_query($connection, $query1);
                                if($query_con1) {
                                    echo "Password updation succesful";
                                    
                                   
// empty value and expiration one hour before
                                    header("Refresh: 2; url='index.php");

                                } 
                            } else {
                                echo "<div class='notification'>Invalid link</div";
                            }
                           }

                        }                        

                    }
                    

                } else {
                    echo "<div class='notification'>Somethings went wrong</div>";
                }

                if(isset($errPass)) {
                    echo "<div class='notification'>{$errPass}</div";
                }
            }

            ?>
             <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">    
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login1.css">
    <link rel="stylesheet" href="css/login2.css">
    <div class="limiter ">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Reset Your Password
					</span>
            
			</div>
            
            <form action="" method="POST">
                <div class="wrap-input100 validate-input m-b-26">
                    <input type="password" class="input100" placeholder="New password" name="new-password" required <?php echo !isset($check)?"disabled":""; ?>>
                </div>
                <div class="wrap-input100 validate-input m-b-26">
                    <input type="password" class="input100" placeholder="Confirm new password" name="confirm-new-password" required <?php echo !isset($check)?"disabled":""; ?>>
                </div>
                
                    <input type="submit" class="login100-form-btn" name="submit" <?php echo !isset($check)?"disabled":""; ?>>
                <br>
                <div class = "password" style="font-family: 'Times New Roman', Times, serif">Must be at lest 4 character long, 1 upper case, 1 lower case  and 1 number <br>
                If you faced any type error please renter by reloading the page. <br>

                <br>
                Thank You!
               </div>
            </form>

        </div> 
    </div>
    
</body>
</html>

    