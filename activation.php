<?php
$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}

    if(isset($_GET['eid']) && isset($_GET['token'])) {
        $validation_key = $_GET['token'];
        $email =($_GET['eid']);


            //Query
        $query= $con->prepare("UPDATE userdata SET is_active = 1 WHERE UserEmail = '$email' AND validation_key = '$validation_key'");
    
        if ($query->execute()) //execute query
        echo "Email verified";
        else{
        echo $query->error;
         echo "error";
    }
 
}
?>