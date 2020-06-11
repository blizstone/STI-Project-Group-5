
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
  <link rel="shortcut icon" type="image/x-icon" href="favi.ico" />
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
</div>
<body>
<br> 
<h1>Members</h1>
<?php
$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}

    $query= $con->prepare("Select accountId, FullName, UserName, UserEmail, UserMobileNumber, LoginPassword, RegDate, Role, is_active from userdata ");
    $query->execute(); 
    $query->store_result();
    $query->bind_result($accountId, $FullName, $UserName, $UserEmail, $UserMobileNumber, $LoginPassword, $RegDate, $Role, $is_active);
    if($query->num_rows === 0) exit('No rows');
    //Displays the header
    
    echo "<table border=2 >" ;
    echo "<tr><th>Account ID</th><br><th>Full Name</th><th>UserName</th><th>User Email</th><th>UserMobileNumber</th><th>LoginPassword</th><th>RegDate</th><th>Role</th><th>Verifed</th></tr>";
    while($query->fetch()){
        //starts listing the row
        echo "<tr><td>". $accountId ."</td><td>". $FullName ."</td><td>". $UserName . "</td><td>". $UserEmail. "</td><td>". $UserMobileNumber ."</td><td>". $LoginPassword ."</td><td>". $RegDate ."</td><td>" . $Role ."</td><td>". $is_active ."</td>";
    }
    
    echo "</table>";
        $con->close();

?>

<form action="adminq3.php" method ="POST" name="listall" style="color: black">
<style>
  body {
background-image: url("https://images.unsplash.com/photo-1508615070457-7baeba4003ab?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60");
background-repeat: no-repeat;
background-size: 100%;
}

table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

  td {
  padding: 15px;
}
tr:hover {background-color:#D3D3D3;}
th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: lightslategray;
  color: white; 
  padding: 15px
}

</style>


<br><br>
<div class="account">
<table>
		<td>Account Id : </td>
		<td><input type="text" name="accountId" required /></td> 
		<td><input type="submit" action="adminq3.php" method="POST" name="listall" value="Delete" /></td>
	
</div>

	

   

