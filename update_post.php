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

$postId=intval($_POST['post_update']);
$title = $_POST['title'];
$content = $_POST['content'];
$category = $_POST['category'];

$query= $con->prepare("UPDATE post SET title=? , content=? , category=? WHERE postId=?");

$query->bind_param("sssi",$title,$content,$category,$postId);
$res=$query->execute();
if ($res){ //execute query
    echo "Query executed.";
}else{
    echo "Error executing query.";
}

header('Location: home.php');
exit;

?>