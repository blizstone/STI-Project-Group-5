<?php
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
	<meta charset="utf-8">
    
    <title>STI scam alert site</title>
    <meta name="author" content="Janos Gyerik">
    <link rel="stylesheet" href="stylesheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">

    <script src="dist/upvotejs/upvotejs.vanilla.js"></script>

    <link rel="stylesheet" href="dist/upvotejs/upvotejs.css">
	<script>//navbar script
		/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
		function myFunction() {
  		var x = document.getElementById("myTopnav");
  		if (x.className === "topnav") {
    	x.className += " responsive";
  		} else {
    	x.className = "topnav";
  		}
	}
	</script>
</head>

<body>
<div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="#news">News</a>
  <a href="#news">News</a>
  <a href="create_post.php">Create</a>
  <a href="viewprofile.php">Account</a> 
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
</body>

<?php
$con = new mysqli("localhost","root","","digiscam");
$count = 0;
$query = mysqli_query($con,"SELECT post.postId, post.title, post.content, post.category, userdata.UserName FROM userdata INNER JOIN post ON post.accountId=userdata.accountId");
foreach($query as $row){
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
 echo "<div class='span'>";
echo"      <div class=''id='vote'></div>";
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
} ?>

<div id="templates" class="hidden">
<div class="upvotejs">
<br>
<a class="upvote" title="This is good stuff. Vote it up! (Click again to undo)"></a>
<span class="count" title="Total number of votes">3</span>
<a class="downvote" title="This is not useful. Vote it down. (Click again to undo)"></a>
<a class="star" title="Mark as favorite. (Click again to undo)"></a>
</div>
</div>
     <script type="text/javascript">
      (function() {
        const proto = document.getElementById('templates').getElementsByClassName('upvotejs')[0];
        const gen = function() {
          var idcount = 0;
          return (target, cssClass, params) => {
            const obj = proto.cloneNode(true);
            obj.className += ' ' + cssClass;
            obj.id = 'u' + (idcount++);
            document.getElementById(target.substr(1)).appendChild(obj);
            return Upvote.create(obj.id, params);
          };
        }();

        [
          params => gen('#vote', '', params),
          params => gen('#upvotejs', 'templates', params)
        ].forEach(fun => {
          fun({count: 1, downvoted: true});
        
        });
      })();
    </script> 
 
</body>
</html>