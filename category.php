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
			$("").change(function(){
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
	<center><h1><strong>Categories</strong></h1></center>
	<br>
	<div class="row">
		
			
		<form method="post" class="form-horizontal">
			<label for="category" class="control-label col-sm-3 col-sm-offset-2" > Select Categories: </label>
			<div class="col-sm-2" >
				<select name="category" class="form-control" id="_dropdown">
					<option>---Select---</option>
					<option val="Lottery Scam">Lottery Scam</option>
					<option val="Impersonation Scam">Impersonation Scam</option>
					<option val="Loan Scam">Loan Scam</option>
					<option val="PayPal Scam">PayPal Scam</option>
					<option val="Phishing Scam">Phishing Scam</option>
					<option val="Job Scam">Job Scam</option>
					<option val="Apple Scam">Apple Scam</option>
					<option val="Apple Scam">Apple Scam</option>
				</select>
			</div>
			<button type="button" name="refresh" id="refresh" class="btn btn-primary">Refresh</button>
		</form>

	</div>
	<br><br>
	<div id="ajaxdata">
		
	</div>
</div>

<?php

?>

</body>
</html>