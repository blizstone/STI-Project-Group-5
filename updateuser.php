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
<body>
<h1>Your Profile</h1>


</body>
</html>

<div class="hero-text">
	<br>
	<h1>Update Personal Details</h1>  
	<img src="https://image.flaticon.com/icons/svg/1177/1177568.svg">
    </div>
	
<form action="updatecode.php" method ="POST" name="listall">

<table>
		
      
        <br>

 
        <br>
        <input type="radio" name="actiontype" value="Update" required>Update
        <br>
         
    
</table>
<p>

<h1>
 Update</h1>

<table>
	<tr><th>Account Id:</th><td><input type="text" name="accountId" required/></td></tr>
     <tr><th>Full Name:</th><td><input type="text" name="FullName" required/></td></tr>
     <tr><th>User Name:</th><td><input type="text" name="UserName" required/></td><tr>
     <tr><th>User Email:</th><td><input type="text" name="UserEmail"required/></td></tr>
     <tr><th>Mobile Number:</th><td><input type="text" name="UserMobileNumber" required/></td></tr>
	 <tr><th>User Password:</th><td><input type="password" name="LoginPassword" required/></td></tr>
	 <td><input type="submit" value="Action" /> Update </td>
	
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
 width: 70%;
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
		<section id="nav">
            <a href="index.php" id="logo" ></a>
			<div id="nav-search-section">
				<form action="search.php">
					<input type="text" id="nav-search">
					<input type="submit" id="nav-search-button" value="Search">
				</form>
			</div>
			<div id="nav-top">
				<p><a href="viewprofile.php" class="nav-top-link">Profile</a></p>
				<p><a href="blog.php" class="nav-top-link">Blog</a></p>
				<p><a href="listing.php" class="nav-top-link">Browse</a></p>
				<p><a href="logout.php" class="nav-top-link">Logout</a></p>
				<p><a href="join.php" class="nav-top-link" id="join">Join</a></p>
			</div>
		</section>
		


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
