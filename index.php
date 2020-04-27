<html>
<<<<<<< HEAD

<head>
	<title>STI scam alert site</title>
	<link rel="stylesheet" href="stylesheet.css">
</head>

<body style="overflow-x:hidden;">
	<section id="nav">
		<a href="index.php" id="logo"></a>
		<div id="nav-search-section">
			<form action="search.php">
				<input type="text" id="nav-search">
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

	$a = 1;
	$b = 2;
	$c = $a + $b;

	echo $c


	?>
</body>

=======
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
				<p><a href="profile.php" class="nav-top-link">Profile</a></p>
				<p><a href="blog.php" class="nav-top-link">Blog</a></p>
				<p><a href="listing.php" class="nav-top-link">Browse</a></p>
				<p><a href="login.php" class="nav-top-link">Sign In</a></p>
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
>>>>>>> 003a6acc22a06ae81f15054df0dbd4d803b3b272
</html>