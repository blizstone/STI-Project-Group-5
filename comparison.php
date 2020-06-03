<?php
session_start();
if (($_SESSION['logged_in'] == '1')) {
   
}  else if(($_SESSION['logged_in'] == '2')){
    header("Location: adminhome.php");
}
else {
        header("location:index.php");
}

$con = new mysqli("localhost","root","","digiscam");

$postId="";
$count==0;


$query = $con->prepare("SELECT `postId`, `content` FROM `post` WHERE postId=?");
$query-> bind_param("i",$count);
$query-> execute();
$query-> bind_result($postId,$content1);
$query-> fetch();
return $exists;


function voteexist($con, $postId, $accountId){
    $voteexist=$con->prepare("SELECT COUNT(*) FROM voting WHERE accountId =? AND postId=? ");
    $voteexist->bind_param("ii", $accountId, $postId);
    $voteexist->execute();
    $voteexist->bind_result($exists);
    $voteexist->fetch();
 //   $con->close();
    return $exists;
}




?>