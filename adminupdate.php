
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (($_SESSION['logged_in'] == '2')) {
} 
else 
{
        header("location:mjo.php");
}
?>
<html>
<div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="#news">News</a>
  <a href="adminupdate.php">Members</a>
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  <link rel="stylesheet" href="stylesheetcss">

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
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

  td {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  padding: 15px;
}
tr:hover {background-color:#D3D3D3;}
th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
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
<html>
	
	<head>
		<title>STI scam alert site</title>
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	

   

