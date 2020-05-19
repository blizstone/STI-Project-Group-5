<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#ajaxdata").load("allrecords.php");
			$("#price_dropdown").change(function(){
				var selected=$(this).val();
				$("#ajaxdata").load("search.php",{selected_price: selected});
			});
			$("#refresh").click(function(){
				$("#ajaxdata").load("allrecords.php");
			});
		});
	</script>

</head>

<body>

<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (($_SESSION['logged_in'] == '1')) {

}
else {
        header("location:mjo.php");
}
?>
<?php

//Establish connection to database named mock
$con = mysqli_connect("localhost","root","","digiscam");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}


$query= $con->prepare("Select postId, accountId, title, content, category  from post");   
$query->execute(); 
    $query->store_result();
    $query->bind_result($postId, $accountId, $title, $content, $category);    
if ($query->execute())






    //Displays the header

    echo "<table>";

    while ($query->fetch()) {
		


		if($category=='Apple Scam')
		
        //starts listing the row
        echo "
 <tr><th>Post id:</th><td>". $postId ."</td></tr>
 <tr><th>Account id:</th><td>". $accountId ."</td></tr><tr>
 <tr><th>Title:</th><td>". $title ."</td></tr>
 <tr><th>Content:</th><td>". $content ."</td></tr>
 <tr><th>Category:</th><td>". $category ."</td></tr>";
	}
	

$con->close();


 
?>

</body>
</html>