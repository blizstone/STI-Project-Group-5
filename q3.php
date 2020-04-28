<?php

session_start();

echo "" . $_SESSION["username_login"] . ".<br>";

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
    echo "<table border=1>" ;
    echo "<tr><td>accountId</td><br><td>Full Name</td><td>UserName</td><td>User Email</td><td>UserMobileNumber</td><td>LoginPassword</td><td>RegDate</td>";
    while($query->fetch()){
        //starts listing the row
        echo "<tr><td>". $accountId ."</td><td>". $FullName ."</td><td>". $UserName . "</td><td>". $UserEmail. "</td><td>". $UserMobileNumber ."</td><td>". $LoginPassword ."</td><td>". $RegDate ."</td><td>";
    }
    
    echo "</table>";
   

    $con->close();


}
?>
 <style>
    table {
        border-collapse: collapse;   
        width: 70%;
        background-color: lightcyan;  
        padding: 10px
    }
        </style>

<html>
	<head>
		<title>STI scam alert site</title>
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body style="overflow-x:hidden;" onload="">
		<section id="nav">
			<a href="index.php" id="logo"></a>
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