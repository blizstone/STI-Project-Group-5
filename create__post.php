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
				
		<section id="createlist-container">
			<form action="input_listing.php" id="" method="post">
			<p class="newlist-labels" >Service Title</p>
			<input type="text" name="serviceTitle" >
			<p class="newlist-labels">Service Description</p>
			<input type="text" name="description" >
			<p class="newlist-labels">Price</p>
			<input type="number" name="price" >
			<p class="newlist-labels">Date of creation</p>
			<input type="date" name="date"><br>
			<br>
			<input type="submit" id="newlist-submit" value="Submit"> 
			</form>
		</section>
	</body>
</html>