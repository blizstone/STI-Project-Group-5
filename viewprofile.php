
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
<?php

$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}


    $query= $con->prepare("Select FullName, UserName, UserEmail, UserMobileNumber, RegDate  from digiscam.userdata where UserName ='".$_SESSION["username_login"]."'" );    
    $result=$query->execute(); 
    $query->store_result();
    $query->bind_result($FullName, $UserName, $UserEmail, $UserMobileNumber, $RegDate);
    if($query->num_rows == 0) exit('No rows');
    
      echo "<table>";
    while($query->fetch()){
     echo "
     <tr><th>Full Name:</th><td>". $FullName ."</td></tr>
     <tr><th>User Name:</th><td>". $UserName ."</td></tr><tr>
     <tr><th>User Email:</th><td>". $UserEmail ."</td></tr>
     <tr><th>Mobile Number:</th><td>". $UserMobileNumber ."</td></tr>
     <tr><th>Registered Date:</th><td>". $RegDate ."</td></tr>
     <tr><td><a href='updateuser.php' class='btn btn-primary'>Update Details </a>
     <a href='deleteuser.php' class='btn btn-danger'>Delete Account </a></td></tr>";
    }
    $con->close();
?>
</div>
<body>
<html>
	<head>
  <title>STI scam alert site</title>
  <link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login1.css">
    <link rel="stylesheet" href="css/login2.css">
  <div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="category.php">Categories</a>
  <a href="create_post.php">Create</a>
  <a href="viewprofile.php">Account</a> 
  <div class="pull-right"><a href="logout.php">Logout</a></div>
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
</a>

<br>
</head>
<body>

</div>
<div class="hero-text">	<h1>My Profile</h1></div>

<br>
<style>
body {    
  background-image: url("https://images.unsplash.com/photo-1513530534585-c7b1394c6d51?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=751&q=80"); 
background-position: top;
background-repeat: no-repeat;
background-size: 100% 60%;
background-color: white;
}
img {
height: 250%;
opacity: 0.5;   
margin-top: 0px;
margin-left: 100px;
}
table {
text-align:left;

margin-left: 138px;
margin-top:200px;
line-height: 70px;
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
margin-top: 50px;
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


</html>

