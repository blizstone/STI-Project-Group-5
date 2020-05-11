<?php
require 'config.php';
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STI scam alert site</title>
	<link rel="stylesheet" href="stylesheet.css"> <!-- general/navbar stylesheet -->
  
  <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet"><!-- navbar/voting stylesheet -->
  <script src="dist/upvote/upvote.vanilla.js"></script>
  <link rel="stylesheet" href="dist/upvote/upvote.css">
  <link rel="stylesheet" href="css/nav.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- navbar stylesheet -->

	<script>//navbar script
		/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
		function myFunction() {
  		var x = document.getElementById("myTopnav");
  		if (x.className === "topnav") {
    	x.className += " responsive";
  		} else {
    	x.className = "topnav";
  		}
	}
	</script>
</head>

<body>
<div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="#news">News</a>
  <a href="create_post.php">Create</a>
  <a href="viewprofile.php">Account</a> 
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>








<?php
$con = new mysqli("localhost","root","","digiscam");
$count = 0;
$query = mysqli_query($con,"SELECT post.postId, post.title, post.content, post.category, userdata.UserName FROM userdata INNER JOIN post ON post.accountId=userdata.accountId");
foreach($query as $row){
 $count++;

echo "<form name='form' method='post' action='post_details.php'>";
echo "<table width='100%'>";
echo "<tr>";
echo "<td>";
echo "<section id='grid-container'>";
echo "<div class='card'>";
$postId= $row['postId'];
echo "<input type='hidden' name='post_array' value=". $postId .">";

//echo "<div class='row'>";
//echo "<div class='span6'>";
echo "<div class='row'>";
echo "<div class='span1'>";
echo "<div class='upvote'>";
echo "<a class='upvote'></a>";
echo "<span class='count'>5</span>";
echo "<a class='downvote'></a>";
echo "<a class='star'></a>";
echo "</div>";
echo "</div>";                       

echo"<p>". $row['UserName'] ."</p>";
echo"<p>".$row['title'] ."</p>";
echo"<p>". $row['content'] ."</p>";
echo"<p>". $row['category']."</p>";

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