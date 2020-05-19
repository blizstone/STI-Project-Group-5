<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.\
require_once("includes/header.php");
require_once("includes/functions.php");
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
    $email = $_POST['UserEmail'];
    $token = getToken(32);
    echo "$token";



    $query= $con->prepare("Update  userdata SET FullName=?, UserName=?, UserEmail=?, UserMobileNumber=?, LoginPassword=?, validation_key='$token', is_active=0 where accountId ='".$_SESSION["accountId"]."'");
    $query->bind_param('sssis', $FullName, $UserName, $UserEmail, $UserMobileNumber, $hasedpassword);
    $mail->addAddress($_POST['UserEmail']);
    
   
   
  
    
   
    $mail->Subject = "Verify your email";
    $mail->Body = "<h2>Thank u for sign up</h2>
                  <a href='localhost/STI-Project-Group-5/activation.php?eid={$email}&token={$token}'>Click here to verify</a>
                  <p>this link valid for 20 min</p>
                  ";
    //if mail send
    if($mail->send()) {
    if ($query->execute()) //execute query
        header("Location: logout.php");
    else{
        echo $query->error;
        header("Location: updateuser.php");
    }
    $con->close();
}
?>
 
