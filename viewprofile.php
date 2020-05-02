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

//Establish connection to database named mock
$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}


$query= $con->prepare("Select accountId, FullName, UserName, UserEmail, UserMobileNumber, LoginPassword, RegDate  from digiscam.userdata where UserName ='".$_SESSION["username_login"]."'" );    
    $query->execute(); 
    $query->store_result();
    $query->bind_result($accountId, $FullName, $UserName, $UserEmail, $UserMobileNumber, $LoginPassword, $RegDate);
    if($query->num_rows == 0) exit('No rows');
    //Displays the header
    echo "<h2>Your Info</h2>";
    echo "<table>";
    
    while($query->fetch()){
        //starts listing the row
     echo "<tr><th>Account Id:</th><td>". $accountId ."</td></tr>
     <tr><th>Full Name:</th><td>". $FullName ."</td></tr>
     <tr><th>User Name:</th><td>". $UserName ."</td></tr><tr>
     <tr><th>User Email:</th><td>". $UserEmail ."</td></tr>
     <tr><th>Mobile Number:</th><td>". $UserMobileNumber ."</td></tr>
     <tr><th>User Password:</th><td>". $LoginPassword ."</td></tr>
     <tr><th>Registered Date:</th><td>". $RegDate ."</td></tr>";
    }
    $con->close();
?>
<html>
 <style>
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
}
    
</style>

<div class="hero-text">
    <h1>My Profile</h1>  
    <div class="wrapper">
     <a href="updateuser.php" class="button">Update Details </a>
      <a href="deleteuser.php" class="button">Delete Account</a>
    </div>
  </div>

</div>
<body>
	<head>
    <img src="https://image.flaticon.com/icons/svg/1177/1177568.svg">

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
  body {
      
  background-image: url("https://images.unsplash.com/photo-1508615121316-fe792af62a63?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80");
  height: 8%;
  background-position: top;
  background-repeat: no-repeat;
  background-size: 100% 60%;
  background-color: linen;
}
img {
height: 250%;
opacity: 0.5;   
margin-top: 0px;
margin-left: 100px;



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
</html>

