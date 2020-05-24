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

$sql=$con->prepare("SELECT MAX(postId) FROM post");
$sql->bind_result($postId);
$sql->execute();

$accountId=intval($_SESSION['accountId']);
$vote=0;

$query= $con->prepare("INSERT INTO `voting`( `accountId`, `postId`, `vote`) VALUES (?,?,?)");
$queryl->bind_param("iii",$accountId,$postId,$vote);
$query->execute();

header("home.php");
exit;

?>