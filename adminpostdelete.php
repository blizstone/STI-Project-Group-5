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

    $query1= $con->prepare("Delete from post where postId = ?");
    $query= $con->prepare("Delete from voting where postId = ?");
    $query1->bind_param('i', $postId );
    $query->bind_param('i', $postId ); 
     //bind the parameters

    if ($query->execute()){  //execute query
  
    if ($query1->execute()){  //execute query
      header("Location: adminpost.php");
    }else{
    echo $query->error;
    echo "Error executing query.";
    }
  }
    $con->close();
    
    ?>
  