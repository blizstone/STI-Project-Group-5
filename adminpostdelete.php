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

    
    $postId = $_POST["postId"];

    $query= $con->prepare("Delete from post where postId = ?");
    $query->bind_param('s', $postId ); //bind the parameters

    if ($query->execute()){  //execute query
		header("Location: adminpost.php");
    }else{
    echo $query->error;
    echo "Error executing query.";
    }
    $con->close();
    
    ?>
  