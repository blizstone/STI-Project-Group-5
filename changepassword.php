<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.\
require_once("includes/header.php");
require_once("includes/functions.php");
session_start();
if (($_SESSION['logged_in'] == '1')) {
}else {
        header("location:index.php");
}


$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
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
  <div class="limiter ">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Reset Your Password
					</span>          
		  

			</div> 
           

            <form action="changepasswordcode.php" method ="POST">
            <tr><th>User Password:</th><td></td><td><div class="wrap-input100 validate-input m-b-26" ><input type="password" name="LoginPassword" autocomplete="0ff"  pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}$" required /></td></tr></div>
            <tr><th>Confirm Password:</th><td></td><td><div class="wrap-input100 validate-input m-b-26" ><input type="password" name="confirmpassword" autocomplete="0ff"  pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}$" required/></td></tr></div>        
            <td><input class="login100-form-btn" action="changepasswordcode.php" method ="POST"  type="submit" value="Update"/></td>

            <div><br>
            Password must be with 1 upper case, 1 lower case, 1 number and min 6 characters</div><br>
        </div> 

    </div>  
</body>
</html>


    
    
 
