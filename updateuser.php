<?php

session_start();
if (($_SESSION['logged_in'] == '1')) {
} else {
  header("location:index.php");
}
require_once("config.php");
?>
<?php
$con = mysqli_connect("localhost", "root", "", "digiscam");
if (!$con) {
  die('Could not connect: ' . mysqli_connect_errno());
}
$query = $con->prepare("Select FullName, UserName, UserEmail, UserMobileNumber,LoginPassword  from digiscam.userdata where accountId ='" . $_SESSION["accountId"] . "'");
$query->execute();
$query->store_result();
$query->bind_result($FullName, $UserName, $UserEmail, $UserMobileNumber, $LoginPassword);
if ($query->num_rows == 0) exit('No rows');

while ($query->fetch()) {
}
?>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STI scam alert site</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/main.css">

  <link rel="stylesheet" href="stylesheet.css"> <!-- general/navbar stylesheet -->



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- navbar stylesheet -->
  <link rel="shortcut icon" type="image/x-icon" href="favi.ico" />
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/login1.css">
  <link rel="stylesheet" href="css/login2.css">
  <script>
    //navbar script
    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>
</head>




<div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="category2.php">Categories</a>
  <a href="create_post.php">Create</a>
  <a href="viewprofile.php">Account</a>

  <div class="pull-right"><a href="logout.php">Logout</a></div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>


</div>

</body>
<?php
$ret = "SELECT * FROM digiscam.userdata where (UserName=:uname ||  UserEmail=:uemail)";
$queryt = $dbh->prepare($ret);
$queryt->bindParam(':uemail', $email, PDO::PARAM_STR);
$queryt->bindParam(':uname', $username, PDO::PARAM_STR);
$queryt->execute();
$results = $queryt->fetchAll(PDO::FETCH_OBJ);
?>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

<form action="updatecode.php" method="POST">

  <table>
    <tr>
      <th>Full Name:</th>
      <td>Fully can contain Letters Only</td>
      <td>
        <div class="input-container"><input type="text" class="write" value="<?= $FullName ?>" name="FullName" pattern="[a-zA-Z\s]+" autocomplete="0ff" required />
      </td>
    </tr>
    <tr>
      <th>User Name:</th>
      <td>Username must contain atleast one number, one letter, and between 6-15 in length</td>
      <td>
        <div class="input-container">
          <input type="text" id="UserName" value="<?= $UserName ?>" name="UserName" autocomplete="0ff" onBlur="checkUsernameAvailability()" pattern="(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$" title="User must be alphanumeric without spaces 6 to 12 chars" class="input-xlarge" required><span id="username-availability-status" style="font-size:12px;"></span>
    <tr>
      <th>User Email:</th>
      <td>Provide valide Email</td>
      <td>
        <div class="input-container"><input type="email" id="UserEmail" value="<?= $UserEmail ?>" name="UserEmail" required autocomplete="0ff"
         onBlur="checkEmailAvailability()"/> <span id="email-availability-status" style="font-size:12px;"></span>
      </td>
    </tr>
    <tr>
      <th>Mobile Number:</th>
      <td>Must be singapore mobile number with country code</td>
      <td>
        <div class="input-container"><input type="text" value="<?= $UserMobileNumber ?>" name="UserMobileNumber" autocomplete="0ff" pattern="65[6|8|9]\d{7}|\+65[6|8|9]\d{7}|\+65\s[6|8|9]\d{7}" required />
      </td>
    </tr>
</form>
<td><input class="login100-form-btn" action="updatecode.php" method="POST" type="submit" value="Update" /></td>
<tr>
  <th>User Password:</th>
  <td>Click here to change your current password</td>
  <td>
    <form action='changepassword.php' method='post'><input type='submit' value='Change Password' class='login100-form-btn' /></div>
</tr>



</table>

</form>
<script>
  function checkUsernameAvailability() {
    // $("#loaderIcon").show();
    jQuery.ajax({
      url: "check_availability.php",
      data: 'usernameUpdate=' + $("#UserName").val() + '&usernameOriginal=' + '<?= $UserName ?>',
      type: "POST",
      success: function(data) {
        $("#username-availability-status").html(data);
      },
      error: function() {
      }
    });
  }
</script>
<!--Javascript for check email availability-->
<script>
  function checkEmailAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "check_availability.php",
      data: 'emailUpdate=' + $("#UserEmail").val() + '&emailOriginal=' + '<?= $UserEmail ?>',
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

<br>
<br>
<div class="success">
  <h1> Note.. <h1>
      <p>Up on updating email address you will be logout and have to reverify<br></p>
</div><br><br>

<style>
  .input-container input {
    border: 0;
    border-bottom: 1px solid #555;
    background: transparent;
    width: 100%;
    padding: 8px 0 5px 0;
    font-size: 16px;
    color: black;

  }

  .success {
    font-size: 9px;
    font-family: Arial, Helvetica, sans-serif;
    margin-left: 56px;

  }

  body {
    background-image: url("https://images.unsplash.com/photo-1513530534585-c7b1394c6d51?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=751&q=80");
    height: 9%;
    background-position: top;
    background-repeat: no-repeat;
    background-size: 100% 60%;
    background-color: white;
  }

  table {
    text-align: left;

    margin-left: 138px;
    line-height: 70px;
    margin-top: 450px;
  }

  th {
    width: 20%;
    height: 12%;

  }

  tr {
    font-size: 20px;
  }

  td {
    font-size: 20px;

    font-size: 14px;
    text-align: left;
  }

  img {
    height: 250%;
    opacity: 0.5;
    margin-top: 0px;
    margin-left: auto;
    margin-right: auto;
  }

  .hero-text {
    color: black;
    text-align: left;
    font-size: 18px;
    margin-top: 120px;
    margin-left: 120px;
  }

  .wrapper {
    width: 90%;
    align-items: center;
    margin-top: 100px;
    margin-right: auto;
    margin-left: auto;
  }

  .button {
    padding: 15px 70px;
    margin: 10px 4px;
    color: black;

    font-size: 28px;
    text-align: center;
    text-decoration: none;
  }

  .button:hover {
    background-color: lightsteelblue;
    opacity: 0.5;
  }
</style>
</head>