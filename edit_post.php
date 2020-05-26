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
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STI scam alert site</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="stylesheet.css"> <!-- general/navbar stylesheet -->
  

  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- navbar stylesheet -->

  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login1.css">
    <link rel="stylesheet" href="css/login2.css">
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
  <a href="category.php">Categories</a>
  <a href="create_post.php">Create</a>
  <a href="viewprofile.php">Account</a> 
  <div class="pull-right"><a href="logout.php">Logout</a></div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>

  
</div>
		
<?php 

$con = new mysqli("localhost","root","","digiscam");

$postId=$_POST['id'];

$query= $con->prepare("SELECT post.title, post.content, post.category, userdata.UserName FROM userdata INNER JOIN post ON post.accountId=userdata.accountId WHERE postId=?");
$query->bind_param("i",$postId);
$query->bind_result($title,$content,$category,$userName);
$query->store_result();
$res=$query->execute();
if ($res){ //execute query
  
}else{
    echo "Error executing query.";
}
foreach($query as $row){
    $query->fetch();
}

?>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="tile">
				<h3 class="tile-title">Edit Post</h3>
				<div class="tile-body">
					<strong class="tile-title">username: </strong><span class="control-label"><?php echo $userName; ?></span>
					<form action='update_post.php' method='post'>
						<input type='hidden' name='post_update' value="$postId ?>">
						<div class="form-group">
							<label class="control-label">Title</label>
							<input class="form-control" name="title" type="text" value="<?= $title; ?>" placeholder="Enter Title">
						</div>
						<div class="form-group">
							<label for="exampleSelect1">Select Category</label>
							<select class="form-control" name="category" id="exampleSelect1">
								<option><?= $category; ?></option>
								<option>Apple Scam</option>
								<option>Credit Card Scam</option>
								<option>Love Scam</option>
								<option>Other Online Scams</option>
								
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Content</label>
							<textarea class="form-control" name="content" rows="4" placeholder="Enter your content"><?= $content; ?></textarea>
						</div>
						<div class="tile-footer">
							<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>