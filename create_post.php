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

<!DOCTYPE html>
<html lang="en">

<html>
	<head>
	<title>STI scam alert site</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="stylesheet.css"> <!-- general stylesheet -->
	 
	
    <link rel="stylesheet" href="css/login1.css">
    <link rel="stylesheet" href="css/login2.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- navbar stylesheet -->

	<script>
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
  <a href="category.php">Categories</a>
	<a href="create_post.php">Create</a>
  <a href="viewprofile.php">Account</a> 
  <div class="pull-right"><a href="logout.php">Logout</a></div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
</body>

	<section id="createlist-container">
		<form action="input_post.php" id="" method="post">
		<p class="newlist-labels" >Title</p>
		<input type="text" name="title" >
		<p class="newlist-labels">Content</p>
		<input type="text" name="content" >
		<!--<p class="newlist-labels">Voting</p>
		<input type="number" name="voting" >-->
		<p class="newlist-labels">Category</p>
		<input type="text" name="category" ><br>
		<br>
		<input type="submit" id="newlist-submit" value="Submit"> 
		</form>
	</section>
</body>

</html>