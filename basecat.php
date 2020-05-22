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



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#ajaxdata").load("allcategory.php");
			$("#category_dropdown").change(function(){
				var selected=$(this).val();
				$("#ajaxdata").load("categorysearch.php",{selected_category: selected});
			});
			$("#refresh").click(function(){
				$("#ajaxdata").load("allcategory.php");
			});
		});
	</script>

</head>
<body>
<div class="container">
	<br><br>
	<center><h1><strong>Search Categories</strong></h1></center>
	<br>
	<div class="row">
		
			
		<form method="post" class="form-horizontal">
			<label for="category" class="control-label col-sm-3 col-sm-offset-2" >Select Category: </label>
			<div class="col-sm-2" >
				<select name="Category" class="form-control" id="category_dropdown">
					<option>---Select---</option>
					<option val="Apple Scam">Apple Scam</option>
					<option val="Lottery">Lottery</option>
					<option val=""></option>
					<option val=""></option>
					<option val=""></option>
					<option val=""></option>
					<option val=""></option>
				</select>
			</div>
			<button type="button" name="refresh" id="refresh" class="btn btn-primary">Refresh</button>
		</form>

	</div>
	<br><br>
	<div id="ajaxdata">
		
	</div>
</div>

</body>
</html>