<?php

session_start();
if (($_SESSION['logged_in'] == '1')) {
}else {
        header("location:index.php");
}

$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}
$query1= $con->prepare("Delete from voting where accountId = '".$_SESSION["accountId"]."'");
$query2= $con->prepare("Delete from post where accountId = '".$_SESSION["accountId"]."'");
$query3= $con->prepare("Delete from userdata where accountId = '".$_SESSION["accountId"]."'");
if($query1->execute()) {
}else {
        echo "error 1";
    }
    if($query2->execute()) {
        if($query3->execute()) {//execute query
header("Location: logout.php");
}else{
echo $query->error;
header("Location: deleteuser.php");
}
    }


    ?>
   