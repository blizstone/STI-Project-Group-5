<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (($_SESSION['logged_in'] == '1')) {
}
else {
        header("location:mjo.php");
}

?>
<html>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
    function checkUsernameAvailability() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_availability.php",
        data: 'UserName=' + $("#UserName").val(),
        type: "POST",
        success: function(data) {
          $("#UserName-availability-status").html(data);
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
<body>
<div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="#news">News</a>
  <a href="#news">News</a>
  <a href="create_post.php">Create</a>
  <a href="viewprofile.php">Account</a> 
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  <link rel="stylesheet" href="dist/upvote/upvote.css">

</div>
  
<div class="hero-text">
	<br>
	<h1>Update Personal Details</h1>  
	<img src="https://image.flaticon.com/icons/svg/1177/1177568.svg">
    </div>
<form action="updatecode.php" method ="POST" name="listall">
<table>   
        <br>
              
</table>
<h1> Update</h1>
<table>
     <tr><th>Full Name:</th><td>Fully can contain Letters Only</td><td><input type="text" name="FullName"  pattern="[a-zA-Z\s]+" required/></td></tr>
     <tr><th>User Name:</th><td>Username can contain any letters or numbers, without spaces 6 to 12 chars</td><td><input type="text" id="UserName" name="UserName" onBlur="checkUsernameAvailability()" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" title="User must be alphanumeric without spaces 6 to 12 chars" class="input-xlarge" required>
</td><tr>
     <tr><th>User Email:</th><td>Provide valide Email</td><td><input type="email" name="UserEmail"required/></td></tr>
     <tr><th>Mobile Number:</th><td>Please provide valid number</td><td><input type="text" name="UserMobileNumber" pattern="[0-8]{8}" maxlength="8" required/></td></tr>
	 <tr><th>User Password:</th><td>Password must contain atleast 4 numbers</td><td><input type="password" name="LoginPassword" pattern="^\S{4,}$" required/></td></tr>
	 <td><input action="updatecode.php" method ="POST"  type="submit" value="Update"/></td>
	
</table>

</form>
<div>
<h1> Guide.. <h1>
<p>Successfull updation can login with new credentials.<br></p>
<style>

  body {
      
  background-image: url("https://images.unsplash.com/photo-1508615121316-fe792af62a63?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80");
  height: 9%;
  background-position: top;
  background-repeat: no-repeat;
  background-size: 100% 60%;
  background-color: linen;
}



table {
text-align:left;
font-family: Arial, Helvetica, sans-serif;
margin-left: 138px;
line-height: 70px;
}
th{
width: 20%;
height: 12%;
font-family: 'Times New Roman', Times, serif;
}
tr {
font-size: 20px;
}
td {
font-size: 20px;
 font-family: 'Times New Roman', Times, serif;
 font-size: 14px;
 
 text-align: left;
}
</style>
</div>
<body>
	<head>
		<title>STI scam alert site</title>
        <link rel="stylesheet" href="stylesheet.css">
        <br>
    </head>
    <br>
    <body 
    style="overflow-x:hidden;" onload="">       
    <style>

img {
height: 250%;
opacity: 0.5;   
margin-top: 0px;
margin-left: auto;
margin-right: auto;


}
.hero-text  {
color: black;
text-align: center;
font-size: 28px;
margin-top: 110px;
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
margin:10px 4px;
color: black;
font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
font-size: 28px;
text-align: center;
text-decoration: none;
 }
.button:hover{
background-color: lightsteelblue;
opacity: 0.5;
}
</style>
</head>
