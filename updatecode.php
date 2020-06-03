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

    $FullName = $_POST["FullName"];
    $UserName = $_POST["UserName"];
    $UserEmail = $_POST["UserEmail"];
    $UserMobileNumber = $_POST["UserMobileNumber"];
    $LoginPassword = $_POST["LoginPassword"];
    $confirm =$_POST['confirmpassword'];
    $hasedpassword=hash('sha256',$LoginPassword);

    $email = $_POST['UserEmail'];
    

    $query= $con->prepare("Select  UserEmail  from userdata where accountId ='".$_SESSION["accountId"]."'");    
    $result=$query->execute(); 
    $query->store_result();
    $query->bind_result($Emailfromdb);
    while($query->fetch())
    if($confirm != $LoginPassword){
        
        echo "Password and confirm password dosen't match";
        header("Refresh: 1; url='updateuser.php");
    } else {
    if ($Emailfromdb == $UserEmail) {
        $query= $con->prepare("Update  userdata SET FullName=?, UserName=?, UserEmail=?, UserMobileNumber=?, LoginPassword=? where accountId ='".$_SESSION["accountId"]."'");
        $query->bind_param('sssis', $FullName, $UserName, $UserEmail, $UserMobileNumber, $hasedpassword);
        if ($query->execute()) {
            header("Location: viewprofile.php");
            } else {
                echo "error";
            }
    } else {
    $query= $con->prepare("Update  userdata SET FullName=?, UserName=?, UserEmail=?, UserMobileNumber=?, LoginPassword=?, validation_key='$token', is_active=0 where accountId ='".$_SESSION["accountId"]."'");
    $query->bind_param('sssis', $FullName, $UserName, $UserEmail, $UserMobileNumber, $hasedpassword);
    $mail->addAddress($_POST['UserEmail']);

    $token = getToken(32);
    $encode_token = base64_encode(urlencode($token));
    $emailencoded = base64_encode(urlencode($_POST['UserEmail']));

    $mail->Subject = "Update verification";
    $mail->Body = "<h2></h2>
                  <a href='localhost/STI-Project-Group-5/activation.php?eid={$emailencoded}&token={$encode_token}'>Click here to verify</a>
                   <p></p>
                   ";
                   if($mail->send()) {
                    if ($query->execute()) //execute query
                        header("Location: logout.php");
                   
        } else {
        echo $query->error;
       header("Location: updateuser.php");
  }
    $con->close();
 
        
    }
}

    
  ?>
 
