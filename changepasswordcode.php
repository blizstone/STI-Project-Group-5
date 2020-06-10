<?php 
session_start();
if (($_SESSION['logged_in'] == '1')) {
}else {
        header("location:index.php");
}
$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}

$Password = $_POST['LoginPassword'];
$confirm = $_POST['confirmpassword'];
$hasedpassword=hash('sha256',$Password);


if ($Password == $confirm) {
    $query= $con->prepare("Update  userdata SET LoginPassword=? where accountId ='".$_SESSION["accountId"]."'");
        $query->bind_param('s', $hasedpassword);
        if ($query->execute()) {
            header("Location: logout.php");
            } else {
                echo "error";
            }
        }
else {
    echo "Password and confirm password dosen't match";
    header("Refresh: 14; url='changepassword.php");

}


?>