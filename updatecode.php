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
   



    $query= $con->prepare("Select  UserName, UserEmail  from userdata");    
    $result=$query->execute(); 
    $query->store_result();
    $query->bind_result($checkusername, $checkemail);

    while($query->fetch())

  
    if ($UserName == $checkusername) {
            echo "Username exist";
        }
        elseif ($UserEmail == $checkemail) {
            echo "Email exist";
        }
        
    else {


    

    $query= $con->prepare("Select  UserEmail  from userdata where accountId ='".$_SESSION["accountId"]."'");    
    $result=$query->execute(); 
    $query->store_result();
    $query->bind_result($Emailfromdb);

    while($query->fetch())

 
    if ($Emailfromdb == $UserEmail) {
        $query= $con->prepare("Update  userdata SET FullName=?, UserName=?, UserEmail=?, UserMobileNumber=? where accountId ='".$_SESSION["accountId"]."'");
        $query->bind_param('sssi', $FullName, $UserName, $UserEmail, $UserMobileNumber);
        if ($query->execute()) {
            header("Location: viewprofile.php");
            } else {
                echo "error";
            }
    } else {
    $token = getToken(32);
    $query= $con->prepare("Update  userdata SET FullName=?, UserName=?, UserEmail=?, UserMobileNumber=?, validation_key='$token', is_active=0 where accountId ='".$_SESSION["accountId"]."'");
    $query->bind_param('sssi', $FullName, $UserName, $UserEmail, $UserMobileNumber);
    $mail->addAddress($_POST['UserEmail']);

    
    $encode_token = base64_encode(urlencode($token));
    $emailencoded = base64_encode(urlencode($_POST['UserEmail']));

    $mail->Subject = "Update verification";
    $mail->Body = "<h2></h2>
                  <a href='https://localhost/STI-Project-Group-5/activation.php?eid={$emailencoded}&token={$encode_token}'>Click here to verify</a>
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
 
