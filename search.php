<?php

if (empty($_POST) || !isset($_POST['search'])) {
    echo '!! No data retrieved to search for.';
    exit();
}
  echo 'I got this : ' . $_POST['search'];
  $mySearch = trim($_POST['search']);

  // Search into DB
  require_once 'db_connect.php';
  // Open a connection to the DBMS
  if (!$connect) {
      echo '!! No connection to the database.';
      exit();
  }

  $query = "SELECT *
  FROM movies
  WHERE title LIKE '$mySearch%'";

  // Send an SQL request to our DB
  $result_query = mysqli_query($connect, $query);

  if(!$result_query) {
      echo "!!! Database connect error: " . mysqli_error($connect);
      exit();
  } 
 
  // Create the array that contains all title matching
  $movies = array();

  echo '<ul id="movies-list">';
  while ($res = mysqli_fetch_assoc($result_query)) {
    echo '<li onClick="selectCountry(\'' . $res['title'] . '\')">' . $res['title'] . '</li>';
  }
  echo '</ul>';

mysqli_close($connect);
