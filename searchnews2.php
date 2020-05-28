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
        <title>Search For Content</title>
        <link rel="stylesheet" href="css/search.css" />
        <script type="text/javascript">

        </script>
    </head>

    <body>
        <form action="search.php" method="$_POST">
            <input type="text" id="searchBar" placeholder="" value="Search..." maxlength="25" autocomplete="on" onmousedown="" onblur="" />
            <input type="submit" id="searchBtn" value="Go!" />

        </form>
    </body>

</html>