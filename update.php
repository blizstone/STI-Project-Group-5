
<html>
<head>
<title>Your Profile</title>
</head>

<body>
<br> 

<form action="q3.php" method ="POST" name="listall" style="color: black">
<table1 border="1">
	<td>
        Action Type: 
        <br>
		<br>
        <input type="radio" name="actiontype" value="View Your Profile" >View
        <br>
        <input type="radio" name="actiontype" value="Update">Update ..Please full all feilds for valid update.
        <br>
        <input type="radio" name="actiontype" value="Delete">Delete ..Please use the ID from View to Delete.
    </td>
</table1>
<style> table1 {
		border-collapse: collapse;   
		   width: 100%;
		   margin-left: 12px;
	}
	</style>
<p>
<table border="3">

	<tr>
		<td>Account Id : </td>
		<td><input type="text" name="accountId" /></td> 
	</tr>
<br>	
	<tr>
		<td>FullName: </td>
		<td> <input type="text" name="FullName"  /></td><br>
	</tr>

	<tr>
		<td>UserName: </td>
		<td><input type="text" name="UserName" /></td>
	</tr>
	
	<tr>
		<td>UserEmail: </td>
		<td><input type="text" name="UserEmail" /></td>
	</tr>
	<tr>
		<td>UserMobileNumber: </td>
		<td><input type="text" name="UserMobileNumber"/></td>
	</tr>
	<tr>
		<td>LoginPassword: </td>
		<td><input type="password" name="LoginPassword"/></td>
	</tr>
	
	<tr>
		<td></td>
		<td><input type="submit" value="Action" /></td>
	</tr>

</table>
<style>
	table {
		border-collapse: collapse;   
		   width: 50%;
		   margin-left: 12px;
		}  
      th,td{  
        background-color: lightcyan;  
        padding: 10px;  
	

	}
</style>

</form>

</body>
</html>
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
				<p><a href="update.php" class="nav-top-link">Profile</a></p>
				<p><a href="blog.php" class="nav-top-link">Blog</a></p>
				<p><a href="listing.php" class="nav-top-link">Browse</a></p>
				<p><a href="logout.php" class="nav-top-link">Logout</a></p>
				<p><a href="join.php" class="nav-top-link" id="join">Join</a></p>

			</div>
		</section>