<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie-edge">
  <link rel="stylesheet" href="stylesheet.css">
  <title>DigiScam</title>
</head>
	<body style="overflow-x:hidden;">
		<section id="nav">
			<a href="index.php" id="logo"></a>
			<div id="nav-search-section">
				<form action="searchresult.php">
					<input type="text" id="nav-search" name="searchterm">
					<input type="submit" id="nav-search-button" value="Search">
				</form>
			</div>
			<div id="nav-top">
				<p><a href="profile.php" class="nav-top-link">Profile</a></p>
				<p><a href="blog.php" class="nav-top-link">Blog</a></p>
				<p><a href="listing.php" class="nav-top-link">Browse</a></p>
				<p><a href="login.php" class="nav-top-link">Sign In</a></p>
				<p><a href="join.php" class="nav-top-link" id="join">Join</a></p>
			</div>
        </section>
        
        <?php 

$con = new mysqli("localhost","root","","itservices");

$serviceId=$_GET['service_array'];
$userId="";
$serviceTitle="";
$description="";
$price="";
$date="";

echo $serviceId;


$query= $con->prepare("SELECT`user_id`, `service_title`, `description`, `price`, `date_created` FROM `services_listings` WHERE `service_id`=?");
$query->bind_param("i",$serviceId);
$query->bind_result($userId,$serviceTitle,$description,$price,$date);
$query->store_result();
$res=$query->execute();
if ($res){ //execute query
    echo "Query executed.";
}else{
    echo "Error executing query.";
}
foreach($query as $row){
    $query->fetch();
}
echo $row;
?>
<body>
<section id="details-container">

<form action="delete_listing.php" method="post">
<?php 
echo "<input type='hidden' name='service_delete' 
value=".$serviceId.">";
?>
<input type="submit" id="delete-button" value="Delete">
</form>

<form action="edit_listing.php" method="post">
<input type="submit" id="edit-button" value="Edit">
<?php 
echo "<input type='hidden' name='service_edit' 
value=".$serviceId.">";
?>
<p class="details-labels">Service Title</p>
<p class="details-content"><?php echo $serviceTitle; ?></p>
<p class="details-labels">Service Description</p>
<p class="details-content"><?php echo $description; ?></p>
<p class="details-labels">Price</p>
<p class="details-content"><?php echo "$". $price; ?></p>
<p class="details-labels">Date of creation</p>
<p class="details-content"><?php echo $date; ?></p>
</form>

</section>

<h1 style="margin: 0rem 0rem 0rem 10rem; font-size: 2rem;">Reviews</h1>

<?php
    require 'includes/config.php';
         
	      $conn = new mysqli("localhost","root","","itservices");
// 	      $serviceid = mysqli_real_escape_string($conn, $_GET['service_id']);
          $serviceId=$_GET['service_array'];;
          echo "<a style='text-decoration:none; margin: 0rem 5rem 0rem 68.5rem;' href='addreview.php?service_array=".$serviceId."'id='add-button1'>Add</a>";

//	      echo $serviceid;
		  $sql = "SELECT * FROM reviews WHERE service_id='$serviceId'";
		  $result = $conn->query($sql);
		  
		  if(mysqli_num_rows($result) > 0) {
// 		    echo "<table>";
		    while($row = $result->fetch_assoc()) { 
		        if (isset($_SESSION['username'])) {
		            $id = $row['review_id'];
		            echo '<section style="font-size:1.2rem;" id="details-container">';
		            echo '<a style="text-decoration:none;" href="deletereview.php?id='.($row['review_id']).'&service_array='.$serviceId.'" id="delete-button">Delete</a>
			       <a style="text-decoration:none;" href="review_edit.php?id='.$id.'&service_array='.$serviceId.'" id="edit-button">Edit</a>';
		            echo "Username: ". ($row['username']);
		            echo "<br>";
		            echo "Review Title: ". ($row['review_title']);
		            echo "<br>";
		            echo "Review: ". ($row['review']);
		            echo "<br>";
		            echo "Date Created: ". ($row['date_created']);
		            echo "</section>";
		        } else {
		        echo '<section style="font-size:1.2rem;" id="details-container">';
 	            echo "Username: ". ($row['username']);
 	            echo "<br>";
 	            echo "Review Title: ". ($row['review_title']); 	
 	            echo "<br>";
 	            echo "Review: ". ($row['review']);
 	            echo "<br>";
	            echo "Date Created: ". ($row['date_created']);
	            echo "</section>";
		    }
//  		 echo "</table>";
		    } 
		 }
		 

?>

</body>

</html>