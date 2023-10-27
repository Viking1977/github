<?php

$servername = "localhost";
$username = "viking77";
$password = "86ghTbp9m8Os37O";
$dbname = "viking77";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>