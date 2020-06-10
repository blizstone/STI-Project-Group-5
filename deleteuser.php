<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (($_SESSION['logged_in'] == '1')) {

}
else {
        header("location:index.php");
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

  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login1.css">
    <link rel="stylesheet" href="css/login2.css">
	<script>//navbar script
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

<body>
<div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="category.php">Categories</a>
  <a href="create_post.php">Create</a>
  <a href="viewprofile.php">Account</a> 
  <div class="pull-right"><a href="logout.php">Logout</a></div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>

  
</div>



<div class="hero-text">
	<br>
	<h1></h1>  

    </div>
    <br>
    <div class="hero-text">	<h1>Delete Your Digscam Account</h1> <p> By pressing delete your current account will be removed from Digiscam</div>

    <div class = "delete"><form action="deletecode.php" method ="POST">
    <br>

<td><input action="deletecode.php" method ="POST"  type="submit" class="login100-form-btn" value="Delete"/></td></div>

<style>

body {    
  background-image: url("https://images.unsplash.com/photo-1513530534585-c7b1394c6d51?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=751&q=80"); 
height: 9%;
background-position: top;
background-repeat: no-repeat;
background-size: 100% 60%;
background-color: white;
}

img {
height: 250%;
opacity: 0.5;   
margin-top: 2px;
margin-left: auto;
margin-right: auto;


}
.delete {
  margin-top: 160px;
  color: black;
  font-size: 28px;
  margin-left: 42px;
  
}
.hero-text  {
color: black;
text-align: left;
font-size: 18px;
margin-top: 60px;
margin-left: 120px;

}  
.wrapper {
width: 90%;
align-items: center;
margin-top: 100px;
margin-right: auto;
margin-left: auto;
  }


 
.delete:hover{

opacity: 0.5;

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
 width: 70%;
}
</style>
</style>
</head>
