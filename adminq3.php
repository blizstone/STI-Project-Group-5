<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (($_SESSION['logged_in'] == '2')) {
}
else {
        header("location:mjo.php");
}

//Establish connection to database named mock
$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}

$delete = "Delete";

    
    $accountId = $_POST["accountId"];

    $query= $con->prepare("Delete from userdata where accountId = ?");
    $query->bind_param('s', $accountId ); //bind the parameters

    if ($query->execute()){  //execute query
    echo " Done ";
    }else{
    echo $query->error;
    echo "Error executing query.";
    }
    $con->close();
    ?>
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
				<p><a href="blog.php" class="nav-top-link">Blog</a></p>
				<p><a href="listing.php" class="nav-top-link">Browse</a></p>
				<p><a href="logout.php" class="nav-top-link">Logout</a></p>
				<p><a href="adminupdate.php" class="nav-top-link" id="Members">Members</a></p>

			</div>
		</section>