<?php
session_start();
if (($_SESSION['logged_in'] == '2')) {
}
else 
{
        header("location:index.php");
}
?>
<html>
	<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STI scam alert site</title>
	<link rel="stylesheet" href="stylesheet.css"> <!-- general/navbar stylesheet -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/main.css">
  <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet"><!-- navbar/voting stylesheet -->
  <link rel="stylesheet" href="css/login1.css">
  <link rel="stylesheet" href="css/login2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- navbar stylesheet -->

  <link rel="stylesheet" href="dist/upvotejs/upvotejs.css">
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
  <a href="adminhome.php" class="active">Home</a>   
  <a href="adminupdate.php">Members</a> 
  <a href="adminpost.php">Posts</a>   
  <div class="pull-right"><a href="logout.php">Logout</a></div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>  
</div>
<?php
$con = new mysqli("localhost","root","","digiscam");
$sql = "SELECT COUNT(*) totalCountByEachCategory, category FROM `post` WHERE category IS NOT NULL GROUP BY category ORDER BY totalCountByEachCategory DESC LIMIT 1";
$result = mysqli_query($con, $sql); // First parameter is just return of "mysqli_connect()" function
$user = "SELECT * FROM userdata";
$user_count = mysqli_query($con, $user);
$row = mysqli_fetch_assoc($result);
$post = "SELECT * FROM post";
$col = mysqli_query($con, $post);
?>


<div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="widget-small primary"><i class="icon fa fa-users fa-3x" style="padding:60px"></i>
            <div class="info">             
              <h4>Users</h4>              
              <p><b><?=$user_count->num_rows?></b></p>
              <form action="adminupdate.php" method="post">
              <button class="more">More Details</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="widget-small info"><i class="icon fa fa-list fa-3x" style="padding:60px"></i>
            <div class="info"><h4>Posts</h4>
              <p><b><?=$col->num_rows?></b></p>
              <form action="adminpost.php" method="post">
              <button class="more">More Details</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="widget-small warning"><i class="icon fa fa-paper-plane fa-3x" style="padding:60px"></i>
            <div class="info">
            <h4>Category</h4>
              
              <p><b><?=!empty($row['category'])?$row['category']: "No Post";?></b></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    </body>
<style>
  
body {
background-image: url("https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80");
background-repeat: no-repeat;
background-size: 100%;
}
      
thead,tbody {
  float: left;   
}

tbody td,thead th {
  display: block;   
}

tbody {
  float: left;   
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.widget-small{
  margin-bottom: 1px ;
}
.more {
color:black;
font-size: 18px;
font-family: Arial, Helvetica, sans-serif;
background-color: lightblue;

}
</style>
 