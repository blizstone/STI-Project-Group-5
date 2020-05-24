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
    <link rel="stylesheet" href="css/search.css">
    </head>
<body>
<form action="search.php" method="$_POST">
    <input type="text" name="search" placeholder="Search">
    <button type="submit" name="submit-search">Search</button>
</form>

<div class="article-container">
    <?php
        $sql = "SELECT * FROM post";
        $result = mysqli_query($con, $sql);
        $queryResults = mysqli_num_rows($result);

        if($queryResults > 0) {
            while
        }
    ?>

</div>








</body>

</html>


