<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
print_r($_SESSION);
if (($_SESSION['logged_in'] == '1')) {
   
}  else if(($_SESSION['logged_in'] == '2')){
	header("Location: adminhome.php");
}
else {
        header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="stylesheet.css"> <!-- general stylesheet -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- navbar stylesheet -->
</head>
	<body>
<div class="topnav" id="myTopnav">
<a href="home.php" class="active">Home</a>
<a href="#news">News</a>
<a href="#news">News</a>
<a href="create_post.php">Create</a>
<a href="viewprofile.php">Account</a> 
<a href="logout.php">logout</a>
<a href="javascript:void(0);" class="icon" onclick="myFunction()">
	<i class="fa fa-bars"></i>
</a>
</div>

	<section id="createlist-container">
		<form action="input_listing.php" id="" method="post">
			

		<p class="newlist-labels" >Title</p>
		<input type="text" name="title" >
		<p class="newlist-labels">Content</p>
		<input type="text" name="content" >
		<!--<p class="newlist-labels">Voting</p>
		<input type="number" name="price" >-->
		<p class="newlist-labels">Catergory</p>
		<input type="text" name="catergory" ><br>
		<br>
		<input type="submit" id="newlist-submit" value="Submit"> 
		</form>
	</section>
</body>

</html>

<?php

?>