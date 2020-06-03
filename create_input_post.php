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
$query= $con->prepare("SELECT MAX(`postId`) FROM `post`");
$query->bind_result($postId);
$query->store_result();
$res=$query->execute();
if ($res){ //execute query
    echo "Query executed.";
}else{
    echo "Error executing query.";
}
foreach($query as $row){
    $query->fetch();
}

$accountId=intval($_SESSION['accountId']);
$postId=$postId;
$vote=0;

$query= $con->prepare("INSERT INTO `voting`( `accountId`, `postId`, `vote`) VALUES (?,?,?)");
$query->bind_param("iii",$accountId,$postId,$vote);
$query->execute();

header('Location: home.php');
exit;

?>