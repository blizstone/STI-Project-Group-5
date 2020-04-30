
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (($_SESSION['logged_in'] == '2')) {
    echo " Admin " ;   
} 
else 
{
        header("location:mjo.php");
}
?>
<html>
<body>
<br> 
<?php
$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}

    $query= $con->prepare("Select accountId, FullName, UserName, UserEmail, UserMobileNumber, LoginPassword, RegDate, Role from userdata ");
    $query->execute(); 
    $query->store_result();
    $query->bind_result($accountId, $FullName, $UserName, $UserEmail, $UserMobileNumber, $LoginPassword, $RegDate, $Role);
    if($query->num_rows === 0) exit('No rows');
    //Displays the header
    echo "<h2>List of exams</h2>";
    echo "<table border=1>" ;
    echo "<tr><td>Account ID</td><br><td>Full Name</td><td>UserName</td><td>User Email</td><td>UserMobileNumber</td><td>LoginPassword</td><td>RegDate</td><td>Role</td></tr>";
    while($query->fetch()){
        //starts listing the row
        echo "<tr><td>". $accountId ."</td><td>". $FullName ."</td><td>". $UserName . "</td><td>". $UserEmail. "</td><td>". $UserMobileNumber ."</td><td>". $LoginPassword ."</td><td>". $RegDate ."</td><td>" . $Role ."</td><td>";
    }
    
    echo "</table>";
        $con->close();

?>
<form action="adminq3.php" method ="POST" name="listall" style="color: black">
<table1 border="1">
	<td>
        
        <br>
		
        <br>
        <input type="radio" name="actiontype" value="Delete">Delete ..Please use the ID 
    </td>
</table1>
<table border="1">

	<tr>
		<td>Account Id : </td>
		<td><input type="text" name="accountId" /></td> 
		<td><input type="submit" value="Action" /></td>
	
</table>
<html>
	<head>
		<title>STI scam alert site</title>
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body style="overflow-x:hidden;" onload="">
		<section id="nav">
			<a href="index.php" id="logo"></a>
			<div id="nav-search-section">
				<form action="search.php">
					<input type="text" id="nav-search">
					<input type="submit" id="nav-search-button" value="Search">
				</form>
			</div>
			<div id="nav-top">
				<p><a href="adminupdate.php" class="nav-top-link">Profile</a></p>
				<p><a href="blog.php" class="nav-top-link">Blog</a></p>
				<p><a href="listing.php" class="nav-top-link">Browse</a></p>
				<p><a href="logout.php" class="nav-top-link">Logout</a></p>
				<p><a href="adminupdate.php" class="nav-top-link" id="Members">Members</a></p>

			</div>
		</section>

   

