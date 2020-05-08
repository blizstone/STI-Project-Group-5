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

$query= $con->prepare("Delete from userdata where accountId = '".$_SESSION["accountId"]."'");
if($query->execute()) {//execute query
header("Location: logout.php");
}else{
echo $query->error;
header("Location: deleteuser.php");
}

    ?>
   