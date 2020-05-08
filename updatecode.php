<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (($_SESSION['logged_in'] == '1')) {
}else {
        header("location:mjo.php");
}
$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}
    $FullName = $_POST["FullName"];
    $UserName = $_POST["UserName"];
    $UserEmail = $_POST["UserEmail"];
    $UserMobileNumber = $_POST["UserMobileNumber"];
    $LoginPassword = $_POST["LoginPassword"];
    $hasedpassword=hash('sha256',$LoginPassword);
    $query= $con->prepare("Update userdata SET FullName=?, UserName=?, UserEmail=?, UserMobileNumber=?, LoginPassword=? where accountId ='".$_SESSION["accountId"]."'");
    $query->bind_param('sssis', $FullName, $UserName, $UserEmail, $UserMobileNumber, $hasedpassword);
    if ($query->execute()) //execute query
        header("Location: logout.php");
    else{
        echo $query->error;
        header("Location: updateuser.php");
    }
    $con->close();
?>
 
