<?php
session_start();
include 'db.php';


$sql = "INSERT INTO movies (movie_title, movie_genre)
VALUES ('{$_POST['movie_title']}','{$_POST['movie_genre']}')";

if ($conn->query($sql) === TRUE) {
$_SESSION['message'] = 'moviedeleted';
header("Location:index.php");
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();


?>

