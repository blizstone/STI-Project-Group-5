<?php
$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}
if(!isset($_GET['eid']) && !isset($_GET['token'])) 
    header("Location: index.php");
    else {

    
    if(isset($_GET['eid']) && isset($_GET['token'])) {

        $email = urldecode(base64_decode($_GET['eid']));
        $validation_key = urldecode(base64_decode($_GET['token']));
        
        
        

            //Query
        $query= $con->prepare("UPDATE userdata SET is_active = 1 WHERE UserEmail = '$email' AND validation_key = '$validation_key'");
    
        if ($query->execute()) //execute query
        echo "Email verified";
        header("Refresh: 4; url='login.php");
    }
        else{
        echo $query->error;
         
        echo "error";
    }
}

?>