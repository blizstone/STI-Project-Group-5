<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
echo "" . $_SESSION["username_login"] . ".<br>";

if (isset($_SESSION['timeout'])) {
    $sessionTTL = time() - $_SESSION["timeout"];
    if ($sessionTTL > $inactive) {
        session_destroy();
        header("Location: logout.php"); 
    }
}
$_SESSION["timeout"] = time();

if (isset($_SESSION['randnum'])) {
    echo "Welcome " ; 
   
}else {
        header("location:mjo.php");
}

?>

<html>
	<head>
		<title>STI scam alert site</title>
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body style="overflow-x:hidden;" onload="">
		<section id="nav">
			<a href="index.php" id="logo"></a>
			<div id="nav-search-section">
				<form action="search.php">
					<input type="text" id="nav-search">
					<input type="submit" id="nav-search-button" value="Search">
				</form>
			</div>
			<div id="nav-top">
				<p><a href="update.php" class="nav-top-link">Profile</a></p>
				<p><a href="blog.php" class="nav-top-link">Blog</a></p>
				<p><a href="listing.php" class="nav-top-link">Browse</a></p>
				<p><a href="logout.php" class="nav-top-link">Logout</a></p>
				<p><a href="join.php" class="nav-top-link" id="join">Join</a></p>

			</div>
		</section>


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