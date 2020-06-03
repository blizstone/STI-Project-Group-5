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
  <a href="category2.php">Categories</a>
  
	<a href="create_post.php">Create</a>
  <a href="viewprofile.php">Account</a> 
  <div class="pull-right"><a href="logout.php">Logout</a></div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
</body>
<div class="container mt-5">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="tile">
				<h3 class="tile-title">Create Post</h3>
				<div class="tile-body">
					<form action='input_post.php' method='post'>
						
						<div class="form-group">
							<label class="control-label">Title</label>
							<input class="form-control" name="title" type="text" placeholder="Enter Title" required>
						</div>
						<div class="form-group">
							<label for="exampleSelect1">Select Category</label>
							<select class="form-control" name="category" id="exampleSelect1" required>
								
								<option>Apple Scam</option>
								<option>Credit Card Scam</option>
								<option>Love Scam</option>
								<option>Other Online Scams</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Content</label>
							<textarea class="form-control" name="content" rows="4" placeholder="Enter your content" required></textarea>
						</div>
						<div class="tile-footer">
							<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle" ></i>Create</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>