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
if (!$con){
    echo "connection fail";
}else {
    echo "connected";
}

$accountId=intval($_SESSION['accountId']);
$title = $_POST['title'];
$content = $_POST['content'];
//$price = $_POST["price"];
$catergory = $_POST['catergory'];

$query= $con->prepare("INSERT INTO `post`(`accountId`, `title`, `content`, `category`) 
VALUES (?,?,?,?)");

$query->bind_param("isss", $accountId, $title,$content,$catergory);
$res=$query->execute();
if ($res){ //execute query
    echo "Query executed.";
}else{
    echo "Error executing query.";
}

header('Location: home.php');
exit;

?>