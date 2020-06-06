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
  <a href="category2.php">Categories</a>
  <a href="create_post.php">Create</a>
  <a href="viewprofile.php">Account</a> 
  <div class="pull-right"><a href="logout.php">Logout</a></div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>

  
</div>

<?php 

$con = new mysqli("localhost","root","","digiscam");

$postId=intval($_POST['id']);



$query= $con->prepare("SELECT post.title, post.content, post.category, userdata.UserName FROM userdata INNER JOIN post ON post.accountId=userdata.accountId WHERE postId=?");
$query->bind_param("i",$postId);
$query->bind_result($title,$content,$category,$userName);
$query->store_result();
$res=$query->execute();
if ($res){ //execute query
    //echo "Query executed.";
}else{
    //echo "Error executing query.";
}
foreach($query as $row){
    $query->fetch();
}

?>



<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-title-w-btn">
					<h3 class="title">Details</h3>
					<div class="btn-group">
						<form action="edit_post.php" method="post">
							<input type="hidden" name="id" value="<?= $postId?>">
							<button class="btn btn-info"><i class="fa fa-lg fa-edit"></i>Edit</button>
						</form>
						<form action="delete_post.php" method="post">
							<input type="hidden" name="post_delete" value="<?= $postId?>">
							<button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i>Delete</button>
						</form>
					</div>
				</div>
				<div class="tile-body">
					<span class="details-labels">Username: </span><span class="details-content"><?= !empty($userName)?$userName:"No User"; ?></span><br><br>
					<span class="details-labels">Title: </span><span class="details-content"><?= !empty($title)?$title:"No User"; ?></span><br><br>
					<span class="details-labels">Content: </span><span class="details-content"><?= !empty($content)?$content:"No User"; ?></span><br><br>
					<span class="details-labels">Category: </span><span class="details-content"><?= !empty($category)?$category:"No User"; ?></span><br><br>
				</div>
		
				<form action="vote.php" id="" method="post" >
					<input type='hidden' name='post' value=<?php echo $postId?>>
					<p class="newlist-submit">vote</p>
					<button class="btn btn-primary" type="submit" name="vote" value= 1 >up</button>
					<p class="newlist-submit"></p>
					<button class="btn btn-danger" type="submit" name="vote" value=-1 >down</button>
				</form>
			</div>
		</div>
		
	</div>
</div>



</body>

</html>