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

<?php
$con = new mysqli("localhost","root","","digiscam");
$count = 0;
$query = mysqli_query($con,"SELECT post.postId, post.title, post.content, post.category, userdata.UserName FROM userdata INNER JOIN post ON post.accountId=userdata.accountId");
$sql = mysqli_query($con,"SELECT SUM(`vote`) FROM voting GROUP BY postId");
foreach($query as $row){
  foreach($sql as $votes){
 $count++;

 echo "<form name='form' method='post' action='post_details.php'>";
 echo "<table width='100%'>";
 echo "<tr>";
 echo "<td>";
 echo "<section id='grid-container'>";
 echo "<div class='card'>";
 $postId= $row['postId'];
 echo "<input type='hidden' name='post_array' value=". $postId .">";
  echo "<div class='row'>";
 echo "<div class='span1'>";
 echo"<p>voting:<br>".$votes['SUM(`vote`)']."<p>"; 
 echo" </div>";

 echo"<p>". $row['UserName'] ."</p>";
 echo"<p>".$row['title'] ."</p>";
 echo"<p>". $row['content'] ."</p>";
 echo"<p>". $row['category']."</p>";
 echo"</div>";
 
 echo"<input type='submit' id='detailsButton' value='More Details'>";
 echo"</div>
 </div>
  </section>
 </td>
 </tr>
 </table>
 </form>";
  ?>
  
<?php
if($count == 3) { // three items in a row
        echo '</tr><tr>';
        $count = 0;
    }
} }?>









</body>

</html>


