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

<?php
    include 'header.php'
?>

<h1>Search Page</h1>

<?php
    if (isset($_POST['submit-search'])){
        $search = mysqli_escape_string($con, $_POST['search']);
        $sql =  "SELECT * FROM post WHERE postId LIKE '%$search%' OR accountId LIKE '%$search%' OR title LIKE '%$search%' content LIKE '%$search%' OR category LIKE '%$search%'";
        $result = mysqli_query($con, $sql);
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                

            }

        } else {
            echo "There are no results matching your search";
        }
    }
?>