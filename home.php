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

<?php
$con = new mysqli("localhost","root","","digiscam");
 $sql = "SELECT COUNT(*) totalCountByEachCategory, category FROM `post` WHERE category IS NOT NULL GROUP BY category ORDER BY totalCountByEachCategory DESC LIMIT 1";
$result = mysqli_query($con, $sql); // First parameter is just return of "mysqli_connect()" function
echo "<br>";
$row = mysqli_fetch_assoc($result);
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="widget-small primary"><i class="icon fa fa-list fa-3x"></i>
        <div class="info">
          <h4>Todays most posts comes under.....</h4>
          <div class="apple"><p><b><?=$row["category"];?></b></p></div>
        </div>
      <form action="search2.php" method="POST">
      <input type="text" name="search" placeholder="Search" div class ="search" id="searchkey" required>
      
      <button type="submit" name="submit-search">Search</button>
      </div>
      </form>
      </div>
      
    </div>
  </div>
</div>
<style>
  .apple {
    color: black;

  }
  
  </style>

<?php
$con = new mysqli("localhost","root","","digiscam");
$count = 0;

$query = mysqli_query($con,"SELECT post.postId, post.title, post.content, post.category, userdata.UserName, SUM(`vote`) FROM post INNER JOIN userdata ON userdata.accountId=post.accountId INNER JOIN voting ON voting.postId=post.postId GROUP BY postId");

while($row = mysqli_fetch_assoc($query)) {
  $vote_row[] = $row;
}

?>
<div class="container-fluid">
  <div class="row">
<?php
foreach($vote_row as $row){
 $count++;
 ?>
    <div class="col-md-6">
      <div class="tile">
        <h3 class="tile-title"><?=!empty($row['title'])?$row['title']: "No Title";?><div class="pull-right"> <i class="fa fa-paper-plane 3x"></i> <?= $row['SUM(`vote`)']." "?></div></h3>
        <div class="tile-body"><?=$row['content'];?></div>
        <div class="tile-body"><?=!empty($row['category'])?$row['category']:"No Category";?></div>
        <strong class="tile-footer pull-right"><?=!empty($row['UserName'])?$row['UserName']: "No User";?></strong>
        <div class="tile-footer">
          <form action="post_details.php" method="post">
            <input type="hidden" name="id" value="<?= $row['postId']?>">
            <button class="btn btn-info">More Details</button>
          </form>
        </div>
      </div>
    </div>

<?php
if($count == 3) { // three items in a row
       
        $count = 0;
    }
} ?>
  </div>
</div>
<div id="templates" class="hidden">
<div class="upvotejs">
<br>


</div>
</div>
     
</body>

</html>
<iframe src="https://fathomless-plains-89933.herokuapp.com/" width="100%" height="490" position="fixed" ></iframe>
