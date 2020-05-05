<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();


if (($_SESSION['logged_in'] == '1')) {
   
}  else if(($_SESSION['logged_in'] == '2')){
	header("Location: adminhome.php");
	
	

}
else {
        header("location:index.php");
}

?>

<html>
	<head>
		<title>STI scam alert site</title>
		<link rel="stylesheet" href="stylesheet.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">

    	<script src="dist/upvote/upvote.vanilla.js"></script>

    	<link rel="stylesheet" href="dist/upvote/upvote.css">
    	<style type="text/css"></style>

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
				<p><a href="viewprofile.php" class="nav-top-link">Profile</a></p>
				<p><a href="blog.php" class="nav-top-link">Blog</a></p>
				<p><a href="listing.php" class="nav-top-link">Browse</a></p>
				<p><a href="logout.php" class="nav-top-link">Logout</a></p>
				
			</div>
		</section>


<?php
$con = new mysqli("localhost","root","","digiscam");
$count = 0;
$query = mysqli_query($con,"SELECT * FROM `post`");
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

echo "<div class='row'>";
echo "<div class='span6'>";
echo "<h3>Basic</h3>";
echo "<div class='row'>";
echo "<div class='span1'>";
echo "<div class='upvote'>";
echo "<a class='upvote'></a>";
echo "<span class='count'>5</span>";
echo "<a class='downvote'></a>";
echo "<a class='star'></a>";
echo "</div>";
echo "</div>";                       

echo"<p>". $row['accountId'] ."</p>";
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