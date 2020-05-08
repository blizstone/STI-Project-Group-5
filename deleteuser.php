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
<html>
<link rel="stylesheet" href="stylesheet.css">

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
  <link rel="stylesheet" href="stylesheetcss">

</div>




<div class="hero-text">
	<br>
	<h1>Delete Your Digscam Account</h1>  
	<img src="https://image.flaticon.com/icons/svg/1177/1177568.svg">
    </div>
    <br>
	<h1> Press Delete to delete your Digiscam account<h1>

    <form action="deletecode.php" method ="POST">

<td><input action="deletecode.php" method ="POST"  type="submit" value="Delete"/></td>

<style>

  body {
      
  background-image: url("https://images.unsplash.com/photo-1543107097-ffe418c8d0f0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80");
  height: 9%;
  background-position: top;
  background-repeat: no-repeat;
  background-size: 100% 55%;
  background-color: linen;
}


img {
height: 250%;
opacity: 0.5;   
margin-top: 2px;
margin-left: auto;
margin-right: auto;


}
.hero-text  {
color: black;
text-align: center;
font-size: 28px;
margin-top: 68px;
}  
.wrapper {
width: 90%;
align-items: center;
margin-top: 100px;
margin-right: auto;
margin-left: auto;
  }
.button {
padding: 15px 70px;
margin:10px 4px;
color: black;
font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
font-size: 28px;
text-align: center;
text-decoration: none;
 }
.button:hover{
background-color: lightsteelblue;
opacity: 0.5;
}

table {
text-align:left;
font-family: Arial, Helvetica, sans-serif;
margin-left: 138px;
line-height: 70px;
}
th{
width: 20%;
height: 12%;
font-family: 'Times New Roman', Times, serif;
}
tr {
font-size: 20px;
}
td {
font-size: 20px;
 font-family: 'Times New Roman', Times, serif;
 width: 70%;
}
</style>
</style>
</head>
