<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (($_SESSION['logged_in'] == '1')) {
    echo "Welcome " ; 

}else if(($_SESSION['logged_in'] == '2')){

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
$actiontype = $_POST["actiontype"];

$update = $actiontype === "Update";
$delete = $actiontype === "Delete";

//This part is for assigning variables to the textfields from Q2 based on their �name�
if($update || $delete ){
    
    $accountId = $_POST["accountId"];
    $FullName = $_POST["FullName"];
    $UserName = $_POST["UserName"];
    $UserEmail = $_POST["UserEmail"];
    $UserMobileNumber = $_POST["UserMobileNumber"];
    $LoginPassword = $_POST["LoginPassword"];

    
    $hasedpassword=hash('sha256',$LoginPassword);
    //Creates the table and the table headers
    echo "<tr><td>". $accountId ."</td><td>". $FullName ."</td><td>". $UserName . "</td><td>". $UserEmail. "</td><td>". $UserMobileNumber ."</td><td>". $LoginPassword ."</td><</tr>";
    echo $delete  ." ". $update ;
    //include "q4.php";
    if($update){ // Update functionality
        $query= $con->prepare("Update userdata SET FullName=?, UserName=?, UserEmail=?, UserMobileNumber=?, LoginPassword=? where accountId =?");
        $query->bind_param('sssiss', $FullName, $UserName, $UserEmail, $UserMobileNumber, $hasedpassword, $accountId);
        echo "done";
    }else{ //Delete functionality
        $query= $con->prepare("Delete from userdata where accountId = ?");
        $query->bind_param('s', $accountId ); //bind the parameters
        
    }
    if ($query->execute()){  //execute query
        echo " Done ";
    }else{
        echo $query->error;
        echo "Error executing query.";
    }
}else { //List all
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


}
?>
 <style>
    table {
        text-align:left;
        font-family: Arial, Helvetica, sans-serif;
        margin-top: 205px;
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

<html>
<!-- <style>
  body {
  background-image: url('https://digitalsynopsis.com/wp-content/uploads/2017/07/beautiful-color-ui-gradients-backgrounds-relay.png');
  background-repeat: no-repeat;
  background-position: top;

  
}    -->
</style>
<body>
	<head>
		<title>STI scam alert site</title>
		<link rel="stylesheet" href="stylesheet.css">
    </head>
    
    <body style="overflow-x:hidden;" onload="">
    
		<section id="nav">
            <a href="index.php" id="logo" ></a>
    
			<div id="nav-search-section">
				<form action="search.php">
					<input type="text" id="nav-search">
					<input type="submit" id="nav-search-button" value="Search">
				</form>
			</div>
			<div id="nav-top">
				<p><a href="update.php" class="nav-top-link">Profile</a></p>
				<p><a href="blog.php" class="nav-top-link">Blog</a></p>
				<p><a href="listing.php" class="nav-top-link">Browse</a></p>
				<p><a href="logout.php" class="nav-top-link">Logout</a></p>
				<p><a href="join.php" class="nav-top-link" id="join">Join</a></p>

			</div>
		</section>