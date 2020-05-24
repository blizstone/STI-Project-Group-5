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

$count = 0;
$query = mysqli_query($con,"SELECT * FROM `post`");
foreach($query as $row){
 $count++;
}

$accountId=intval($_SESSION['accountId']);
$postId=$count;
$vote=0;

$query= $con->prepare("INSERT INTO `voting`( `accountId`, `postId`, `vote`) VALUES (?,?,?)");
$query->bind_param("iii",$accountId,$postId,$vote);
$query->execute();

header('Location: home.php');
exit;

?>