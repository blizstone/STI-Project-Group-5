<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (($_SESSION['logged_in'] == '2')) {
}
else 
{
        header("location:mjo.php");
}
?>

<html>
	<head>
		<title>STI scam alert site</title>
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="#news">News</a>
  <a href="adminupdate.php">Members</a>
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  <link rel="stylesheet" href="stylesheetcss">

</div>



<?php
$con = new mysqli("localhost","root","","scamtest");
$count = 0;
$query = mysqli_query($con,"SELECT * FROM `reports`");
foreach($query as $row){
 $count++;

echo "<form name='form' method='post' action='listing_details.php'>";
echo "<table width='100%'>";
echo "<tr>";
echo "<td>";
echo "<section id='grid-container'>";
echo "<div class='card'>";
$postId= $row['postId'];
echo "<input type='hidden' name='service_array' value=".$postId .">";

echo"<p>". $row['username'] ."</p>";
echo"<p>". $row['content'] ."</p>";
echo"<p>"."$". $row['category']."</p>";
//echo"<p>".$row["date_created"] ."</p>";
echo"<input type='submit' id='detailsButton' value='More Details'>";
echo"</div>
 </section>
</td>
</tr>
</table>
</form>";
?>
<?php
if($count == 3) { // three items in a row
        echo '</tr><tr>';
        $count = 0;
    }
} ?>
 
</body>
</html>