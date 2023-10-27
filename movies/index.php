<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <div class="row">
<div class="col-md-6">
    <h1>Movies</h1>



    <?php
if (isset($_SESSION['message'])) {
       if ($_SESSION['message'] == 'movieadded') {
            echo '<div class="alert alert-success">
            <strong>Success!</strong> Movies added.
          </div>';
          }
        }
     ?>

<?php
if (isset($_SESSION['message'])) {
  if ($_SESSION['message'] == 'moviedeleted') {
    echo '<div class="alert alert-success">
    <strong>Success!</strong> Movies deleted.
  </div>';
  }
}
?>




<form action="./addmovie.php", method="POST">
    <div class="form-group">
    <label>Movie Title:</label>
                    <input type="text" class="form-control" name="movie_title">
    </div>
    <div class="form-group">
  <label for="sel1">Select list:</label>
<select name="movie_genre" class="form-control">
<?php
$genres = array("","Action","Comedy","Kids and Family", "Drama","Fantasy","Horror","Mystery","Romance","Thriller","Western");

foreach($genres as $genre) {
echo'<option value="'.$genre.'">'.$genre.'</option>';
}
?>



</select>
</div>

<br>
<button type="submit" class="btn btn-success" name="addmovie">Add Movie</button>

<button type="submit" class="btn btn-danger" name="deletemovie">Delete Movie</button>

<button type="submit" class="btn btn-info" name="updatemovie">Update Movie</button>
</form>
<br><br>
<table class="table table-hover table-striped table-bordered">
    <tr>
            <th>ID</th>
            <th>Movie</th>
            <th>Genre</th>
          </tr>
<?php




include 'db.php';
// include '../myguest/dp.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
<tr>
      <td><?=$row['movie_id']?></td>
      <td><?=$row['movie_title']?></td>
      <td><?=$row['movie_genre']?></td>
</tr>

<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</table>

</div>
    </body>
 
   


<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</html>