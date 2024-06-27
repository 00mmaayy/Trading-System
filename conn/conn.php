<?php
//create connection
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);

//select database
$database = "lilyhill";
$db = mysqli_select_db($conn, $database) or die("I Couldn't select your database");
?>
