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
$postId = $_POST['post'];
$vote = $_POST['vote'];

function upvote($con, $postId, $accountId){
    $upvoted =$con->prepare("UPDATE voting SET vote=1 WHERE postId=? AND accountId=?");
    $upvoted->bind_param("ii", $postId, $accountId);
    $upvoted->execute();
//    $con->close();
}

function downvote($con, $postId, $accountId){
    $downvoted =$con->prepare("UPDATE voting SET vote=-1 WHERE postId=? AND accountId=?");
    $downvoted->bind_param("ii", $postId, $accountId);
    $downvoted->execute();
 //   $con->close();
}

function add($con, $postId, $accountId, $vote){
    $add= $con->prepare("INSERT INTO `voting` (`accountId`, `postId`, `vote`) VALUES (?,?,?)");
    $add->bind_param("iii", $accountId, $postId, $vote);
    $add->execute();
 //   $con->close();
}

function getvote($con, $postId, $accountId){
    $getvote=$con->prepare("SELECT vote FROM voting WHERE accountId =? AND postId=? ");
    $getvote->bind_param("ii", $accountId, $postId);
    $getvote->execute();
    $getvote->bind_result($votedb);
    $getvote->fetch();
//    $con->close();
    return $votedb;
}

function voteexist($con, $postId, $accountId){
    $voteexist=$con->prepare("SELECT COUNT(*) FROM voting WHERE accountId =? AND postId=? ");
    $voteexist->bind_param("ii", $accountId, $postId);
    $voteexist->execute();
    $voteexist->bind_result($exists);
    $voteexist->fetch();
 //   $con->close();
    return $exists;
}

echo getvote($con, $postId, $accountId);


if (voteexist($con, $postId, $accountId) > 0) {
    //Update
    if ($vote == 1) {
        upvote($con, $postId, $accountId);
        echo "<script>
        alert('Voted');
        window.location.href='home.php';
        </script>";
    } else {
        downvote($con, $postId, $accountId);
        echo "<script>
        alert('Voted');
        window.location.href='home.php';
        </script>";
    }
} else {
    //Add
    add($con, $postId, $accountId, $vote);
    echo "<script>
    alert('Voted');
    window.location.href='home.php';
    </script>";
}
//header('Location: home.php');
?>