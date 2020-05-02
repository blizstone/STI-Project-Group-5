<?php
$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}
$actiontype = $_POST["actiontype"];
$delete = $actiontype === "Delete";
    $UserName = $_POST["UserName"];
        $query= $con->prepare("Delete from userdata where UserName = ?");
        $query->bind_param('s', $UserName ); //bind the parameters
            if($query->execute()) {//execute query
            header("Location: logout.php");
            }else{
             echo $query->error;
            header("Location: deleteuser.php");
    }
    
    ?>
   