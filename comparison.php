<?php
session_start();
if (($_SESSION['logged_in'] == '1')) {
   
}  else if(($_SESSION['logged_in'] == '2')){
    header("Location: adminhome.php");
}
else {
        header("location:index.php");
}

$con = new mysqli("localhost","root","","digiscam");





function compare(){

}

?>