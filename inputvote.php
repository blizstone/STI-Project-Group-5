
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
$vote = $_POST['vote'];
$postId =$_POST['post'];


//$price = $_POST["price"];


$query= $con->prepare("INSERT INTO `voting` (`accountId`,`postId`, `vote`) 
VALUES (?,?,?)");

$query->bind_param("iii", $accountId, $postId, $vote);
$res=$query->execute();
if ($res){ //execute query
    echo "Query executed.";
    header('Location: home.php');
}else{
    echo "Error executing query.";
}


exit;

?>

