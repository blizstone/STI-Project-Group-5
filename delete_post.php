<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (($_SESSION['logged_in'] == '1')) {
   
}  else if(($_SESSION['logged_in'] == '2')){
	header("Location: adminhome.php");
}
else {
        header("location:index.php");
}

$con = new mysqli("localhost","root","","digiscam");

$postId=intval($_POST['post_delete']);

$sql= $con->prepare("SELECT `accountId` FROM `post` WHERE postId=?");
$sql->bind_param("i",$postId);
$sql->bind_result($accountIdPost);
$sql->store_result();

$res=$sql->execute();
if ($res){ //execute query
    //echo "Query executed.";
    $sql->fetch();
}else{
    //echo "Error executing query.";
}

$accountId=intval($_SESSION['accountId']);

if ($accountId != $accountIdPost){
    echo "<script>
    alert('You are not the creator of the post');
    window.location.href='home.php';
    </script>";
}
else{

    $con = new mysqli("localhost","root","","digiscam");
    $postId=intval($_POST['post_delete']);

    $query1= $con->prepare("Delete from voting where postId = '".$postId."'");
    $query2= $con->prepare("Delete from post where postId = '".$postId."'");
    
    if($query1->execute()) {
    }else {
            //echo "error 1";
        }
        if($query2->execute()) {
            header('Location: home.php');
            exit;
        }else{
            //echo "error 2";
        }
}
?>