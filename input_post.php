<?php 

$con = new mysqli("localhost","root","","itservices");
if (!$con){
    echo "connection fail";
}else {
    echo "connected";
}

$userId = 1;
$serviceTitle = $_POST["serviceTitle"];
$description = $_POST["description"];
$price = $_POST["price"];
$date = $_POST["date"];

$query= $con->prepare("INSERT INTO services_listings (user_id, service_title, description, price, date_created) 
VALUES (?,?,?,?,?)");

$query->bind_param("issss", $userId, $serviceTitle,$description,$price,$date);
$res=$query->execute();
if ($res){ //execute query
    echo "Query executed.";
}else{
    echo "Error executing query.";
}

header('Location: listing.php');
exit;

?>