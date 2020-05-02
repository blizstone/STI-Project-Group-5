<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (($_SESSION['logged_in'] == '1')) {
}else {
        header("location:mjo.php");
}

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
    if($update) // Update functionality
        $query= $con->prepare("Update userdata SET FullName=?, UserName=?, UserEmail=?, UserMobileNumber=?, LoginPassword=? where accountId =?");
        $query->bind_param('sssiss', $FullName, $UserName, $UserEmail, $UserMobileNumber, $hasedpassword, $accountId);
    if ($query->execute()) //execute query
        header("Location: logout.php");

    else{
        echo $query->error;
        header("Location: updateuser.php");
    }
    }
    $con->close();
?>
 
