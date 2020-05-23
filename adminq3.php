<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (($_SESSION['logged_in'] == '2')) {
}
else {
        header("location:mjo.php");
}

//Establish connection to database named mock
$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}

$delete = "Delete";

    
    $accountId = $_POST["accountId"];

    $query= $con->prepare("Delete from userdata where accountId = ?");
    $query->bind_param('s', $accountId ); //bind the parameters

    if ($query->execute()){  //execute query
		header("Location: adminupdate.php");
    }else{
    echo $query->error;
    echo "Error executing query.";
    }
    $con->close();
    ?>
  