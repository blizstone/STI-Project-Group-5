<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (($_SESSION['logged_in'] == '2')) {
}
else {
        header("location:index.php");
}

//Establish connection to database named mock
$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}

$delete = "Delete";

    
    $accountId = $_POST["accountId"];
    
    $query1= $con->prepare("Delete from voting where accountId = $accountId");
    $query2= $con->prepare("Delete from post where accountId = $accountId");
    $query3= $con->prepare("Delete from userdata where accountId = $accountId");
    if($query1->execute()) {
      echo "Done";
      if($query2->execute()) {
        if($query3->execute()) {//execute query
        header("Location: adminupdate.php");
        }else{
        echo $query->error;
        echo "error";
        }
    }
  }
    $con->close();
    ?>
  