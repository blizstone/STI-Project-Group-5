


<?php
//Database Configuration File
include('config.php');
require_once("includes/header.php");
require_once("includes/functions.php");
error_reporting(0);

getToken(32);

if (isset($_POST['signup'])) {
  
  $fullname = escape($_POST['fname']);
  $username = escape($_POST['username']);
  $mobile = escape($_POST['mobilenumber']);
  $password = escape($_POST['password']);
  $confirm = escape($_POST['password_confirm']);
  $email = escape($_POST['email']);

  $hasedpassword = hash('sha256', $password);
 
  $ret = "SELECT * FROM digiscam.userdata where (UserName=:uname ||  UserEmail=:uemail)";
  $queryt = $dbh->prepare($ret);
  $queryt->bindParam(':uemail', $email, PDO::PARAM_STR);
  $queryt->bindParam(':uname', $username, PDO::PARAM_STR);
  $queryt->execute();
  $results = $queryt->fetchAll(PDO::FETCH_OBJ);
  if ($queryt->rowCount() == 0) {
    
    if($password != $confirm){
      echo $nomatch;
      $nomatch = "Sorry the password and confirm password dosen't match";
    }
    else {

    $mail->addAddress($_POST['email']);
    $email = $_POST['email'];
    
    
    $token = getToken(32);
    $encode_token = base64_encode(urlencode($token));
    $emailencoded = base64_encode(urlencode($_POST['email']));
 
    $mail->Subject = "Verify your email";
    $mail->Body = "<h2>Thank u for sign up</h2>
                  <a href='https://localhost/STI-Project-Group-5/activation.php?eid={$emailencoded}&token={$encode_token}'>Click here to verify your account</a>
                  
                  ";
    //if mail send
    if($mail->send()) {
    $sql = "INSERT INTO digiscam.userdata(FullName,UserName,UserEmail,UserMobileNumber,LoginPassword,validation_key) VALUES(:fname,:uname,:uemail,:umobile,:upassword, :utoken)";
    $query = $dbh->prepare($sql);
    // Binding Post Values
    $query->bindParam(':fname', $fullname, PDO::PARAM_STR);
    $query->bindParam(':uname', $username, PDO::PARAM_STR);
    $query->bindParam(':uemail', $email, PDO::PARAM_STR);
    $query->bindParam(':umobile', $mobile, PDO::PARAM_INT);
    $query->bindParam(':upassword', $hasedpassword, PDO::PARAM_STR);
    $query->bindParam(':utoken', $token, PDO::PARAM_STR);
    $query->execute();

    if ($sql) {
      $msg = "Please Verify your email to login";
    } else {
      $error = "Something went wrong.Please try again";
    }
  } else {
    $error = "Something went wrong.Please try again";
  }
}
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PDO | Registration Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/login1.css">
    <link rel="stylesheet" href="css/login2.css">
  <style>
   
  </style>
  <!--Javascript for check username availability-->
 
</head>

<body>
  <form class="form-horizontal" action='' method="post">
    <fieldset>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
     
      <!--Error Message-->
     
  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 mt-3" style="width:63%;">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>
        <div id="legend" style="padding-left:4%"><br>
        <legend class="">Register | <a href="login.php">Login</a></legend>
      </div>
      <?php if ($error) { ?><div class="errorWrap">
          <strong>Error </strong> : <?php echo htmlentities($error); ?></div>
      <?php } ?>
      <?php if ($nomatch) { ?><div class="errorWrap">
          <strong>Error </strong> : <?php echo htmlentities($nomatch); ?></div>
      <?php } ?>
        <!--Success Message-->
      <?php if ($msg) { ?><div class="succWrap" href="index.php">
          <strong>Well Done </strong> : <?php echo htmlentities($msg); ?></div>
      <?php } ?>
      <div class="login100-form validate-form">
        <form method="post">
        <div class="wrap-input100 validate-input m-b-26">
          <input type="text" class="input100" id="fname" name="fname" pattern="[a-zA-Z\s]+"  
          placeholder="Full name must contain letters only"  required>
        </div>

        <div class="wrap-input100 validate-input m-b-26">
          <input type="text" id="username" name="username" onBlur="checkUsernameAvailability()" 
          pattern="(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$" placeholder="Username must contain atleast one number, one letter, and between 6-15 in len" class="input100" required>
          <span id="username-availability-status" style="font-size:12px;"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-26">
          <input type="email" id="email" name="email"  placeholder="Please provide your E-mail" onBlur="checkEmailAvailability()" class="input100" required>
          <span id="email-availability-status" style="font-size:12px;"></span>
        </div>
       
        <div class="wrap-input100 validate-input m-b-26">
          <input type="text" id="mobilenumber" name="mobilenumber" pattern="65[6|8|9]\d{7}|\+65[6|8|9]\d{7}|\+65\s[6|8|9]\d{7}" placeholder="Must be singapore mobile number with country code" 
           class="input100" required >
        </div>
        
        <div class="wrap-input100 validate-input m-b-26">
          <input type="password" id="password" name="password" placeholder="Password must be with 1 upper case, 1 lower case, 1 number and min 6 characters" 
          pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$"  required  class="input100">        
        </div>    
        <div class="wrap-input100 validate-input m-b-26">
          <input type="password" id="password_confirm" name="password_confirm" placeholder="Please confirm password" class="input100" required>          
        </div>
        <div class="control-group">
          <div class="controls">
            <button class="login100-form-btn" type="submit" name="signup">Signup </button>
          </div>
        </div>
    </fieldset>
  </form>
  <script>
    function checkUsernameAvailability() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_availability.php",
        data: 'username=' + $("#username").val(),
        type: "POST",
        success: function(data) {
          $("#username-availability-status").html(data);
          $("#loaderIcon").hide();
        },
        error: function() {}
      });
    }
  </script>
  <!--Javascript for check email availability-->
  <script>
    function checkEmailAvailability() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_availability.php",
        data: 'email=' + $("#email").val(),
        type: "POST",
        success: function(data) {
          $("#email-availability-status").html(data);
          $("#loaderIcon").hide();
        },
        error: function() {
          event.preventDefault();
        }
      });
    }
  </script>
  <script type="text/javascript">
</script>
</body>
</html>