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
            function active(){
                var searchBar = document.getElementById('searchBar');

                if(searchBar.value == 'Search...'){
                    searchBar.value = ''
                    searchBar.placeholder = 'Search...'

                }
            }

            function inactive(){
                var searchBar = document.getElementById('searchBar');

                if(searchBar.value == ''){
                    searchBar.value == 'Search...'
                    searchBar.placeholder = ''
                }
            }

        </script>
    </head>

    <body>
        <form action="search.php" method="$_POST">
            <input type="text" id="searchBar" placeholder="" value="Search..." maxlength="25" autocomplete="on" onmousedown="active();" onblur="inactive();" /><input type="submit" id="searchBtn" value="Go!" />



        </form>
        <?php
            $query = mysql_query("SELECT * FROM post");
            $num_rows = mysql_num_rows($query);

            while($row = mysql_fetch_array($query)){
                $postId = $row['postId'];
                $accountId = $row['accountId'];
                $title = $row['title'];
                $content = $row['content'];
                $category = $row['category'];

                echo $postId . '' . $accountId . '' . $title . '' . $content . '' . $category .'<br />';
            }
        ?>


    </body>

</html>