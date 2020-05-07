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
	<link rel="stylesheet" href="stylesheet.css"> <!-- general stylesheet -->

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">

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
  <a href="#news">News</a>
  <a href="#news">News</a>
  <a href="create_post.php">Create</a>
  <a href="viewprofile.php">Account</a> 
  <a href="logout.php">logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
		
<?php 

$con = new mysqli("localhost","root","","digiscam");

$postId=$_POST['post_edit'];

$query= $con->prepare("SELECT post.title, post.content, post.category, userdata.UserName FROM userdata INNER JOIN post ON post.accountId=userdata.accountId WHERE postId=?");
$query->bind_param("i",$postId);
$query->bind_result($title,$content,$category,$userName);
$query->store_result();
$res=$query->execute();
if ($res){ //execute query
    echo "Query executed.";
}else{
    echo "Error executing query.";
}
foreach($query as $row){
    $query->fetch();
}

?>

<section id='createlist-container'>
<form action='update_post.php' method='post'>
<?php
echo "<input type='hidden' name='post_update' value=".$postId .">";
?>

<p class="details-labels">Username</p>
<p class="details-content"><?php echo $userName; ?></p>
<p class="details-labels">Title</p>
<p class="details-content"><?php echo $title; ?></p>
<input type='text' name='title'>
<p class="details-labels">Content</p>
<p class="details-content"><?php echo $content; ?></p>
<input type="text" name="content" >
<!--<p class="newlist-labels">Voting</p>
<input type="number" name="votting" >-->
<p class="details-labels">Category</p>
<p class="details-content"><?php echo $category; ?></p>
<input type="text" name="category" ><br>
<br>
<input type="submit" id="newlist-submit" value="Update" > 
</form>

</section>
</body>
</html>