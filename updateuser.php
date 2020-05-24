<?php
session_start();
if (($_SESSION['logged_in'] == '1')) {
}
else {
        header("location:mjo.php");
}?>
<?php
    $con = mysqli_connect("localhost","root","","digiscam");
    if (!$con){
        die('Could not connect: ' . mysqli_connect_errno());
    }
    $query= $con->prepare("Select FullName, UserName, UserEmail, UserMobileNumber,LoginPassword  from digiscam.userdata where UserName ='".$_SESSION["username_login"]."'" );    
    $query->execute(); 
    $query->store_result();
    $query->bind_result($FullName, $UserName, $UserEmail, $UserMobileNumber,$LoginPassword);
    if($query->num_rows == 0) exit('No rows');
    
      while($query->fetch()){
      }
?>
<html>
<head>
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login1.css">
    <link rel="stylesheet" href="css/login2.css">
</head>
<body>
<div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="create_post.php">Create</a>
  <a href="category.php">Categories</a>
  <a href="viewprofile.php">Account</a> 
  <div class="pull-right"><a href="logout.php">Logout</a></div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a></div>
<div class="hero-text">	<h1>Update Personal Details</h1></div>

<form action="updatecode.php" method ="POST">
<table>
     <tr><th>Full Name:</th><td>Fully can contain Letters Only</td><td><div class="input-container" ><input type="text" class ="write" value="<?=$FullName?>" name="FullName"  pattern="[a-zA-Z\s]+" autocomplete="0ff" required/></td></tr>
     <tr><th>User Name:</th><td>Username can contain any letters or numbers, without spaces 6 to 12 chars  </td><td><div class="input-container" ><input type="text" id="UserName" value="<?=$UserName?>" name="UserName" autocomplete="0ff"  onBlur="checkUsernameAvailability()" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" title="User must be alphanumeric without spaces 6 to 12 chars" class="input-xlarge" required>
     <tr><th>User Email:</th><td>Provide valide Email</td><td><div class="input-container" ><input type="email" value="<?=$UserEmail?>" name="UserEmail"required autocomplete="0ff" /></td></tr>
     <tr><th>Mobile Number:</th><td>Please provide valid number</td><td><div class="input-container" ><input type="text" value="<?=$UserMobileNumber?>" name="UserMobileNumber" autocomplete="0ff"  pattern="[0-8]{8}" maxlength="8" required/></td></tr>
	   <tr><th>User Password:</th><td>Password must contain atleast 4 numbers</td><td><div class="input-container" ><input type="password" name="LoginPassword" autocomplete="0ff"  pattern="^\S{4,}$" required/></td></tr></div>
     <td><input class="login100-form-btn" action="updatecode.php" method ="POST"  type="submit" value="Update"/></td>	
</table>
<br>
<br>
<div class="success"><h1> Guide.. <h1>
<p>Successfull updation will send an email to Registered email address for proper authentication<br></p></div><br><br>
<script src="http://code.jquery.com/jquery-1.11.1.min.js">


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
<style>
.input-container input{ 
border:0;
border-bottom:1px solid #555;  
background:transparent;
width:100%;
padding:8px 0 5px 0;
font-size:16px;
color:black;

}
.success{
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
text-align:left;

margin-left: 138px;
line-height: 70px;
margin-top: 220px;
}
th{
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
.hero-text  {
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
margin:10px 4px;
color: black;

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