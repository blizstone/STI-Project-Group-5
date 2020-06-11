<?php 
require_once("config.php");
// Code for checking username availabilty
if(!empty($_POST["username"])) {
$uname= $_POST["username"];
$sql ="SELECT UserName FROM  userdata WHERE UserName=:uname";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Username already exists.</span>";
} else{	
echo "<span style='color:green'> Username available for Registration.</span>";
}
}


if(!empty($_POST["usernameUpdate"])) {
    $uname= $_POST["usernameUpdate"];
    $unameOriginal= $_POST["usernameOriginal"];
    $sql ="SELECT UserName FROM  userdata WHERE UserName=:uname AND UserName!=:unameOriginal";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':uname', $uname, PDO::PARAM_STR);
    $query-> bindParam(':unameOriginal', $unameOriginal, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if($query -> rowCount() > 0)
    {
    echo "<span style='color:red'> Username already exists.</span>";
    } else{	
    echo "<span style='color:green'> Username available for Registration.</span>";
    }


    



    }

    // Code for checking email availabilty
if(!empty($_POST["email"])) {
    $email= $_POST["email"];
    $sql ="SELECT UserEmail FROM  userdata WHERE UserEmail=:email";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if($query -> rowCount() > 0)
    {
    echo "<span style='color:red'>Email-id already exists.</span>";
    } else{	
    echo "<span style='color:green'>Email-id available for Registration.</span>";
    }
    }


    if(!empty($_POST["emailUpdate"])) {
        $email= $_POST["emailUpdate"];
        $emailupOriginal= $_POST["emailOriginal"];
        $sql ="SELECT UserEmail FROM  userdata WHERE UserEmail=:email AND UserEmail!=:emailupOriginal";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':emailupOriginal', $emailupOriginal, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        if($query -> rowCount() > 0)
        {
        echo "<span style='color:red'>Email-id already exists.</span>";
        } else{	
        echo "<span style='color:green'>Email-id available for Registration.</span>";
        }
        }

?>