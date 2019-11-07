<!DOCTYPE html>
<html>

<head>
	<title>Movies List</title>
</head>

<body>
	<?php
	require_once 'nav.html';
	?>

	<h1>Movies list</h1>
	<hr>

	<?php

	require_once 'db_connect.php';

	if ($connect) {

		$sql_query = 'SELECT * FROM movies ORDER BY title';
		


		$result_query = mysqli_query($connect, $sql_query);

		while ($db_field = mysqli_fetch_assoc($result_query)) {

			// div
			echo '<div style="display:flex; justify-content: space-between; ">';

			// div 1 = image
			echo '<div><img width="150px" src="' . $db_field['picture'] . '" alt="' . $db_field['title'] . '"></div>';

			// div 2 = id + title + description
			echo '<div>#' . $db_field['movie_id'] . '&nbsp;';
			echo '<strong>Title: </strong>' .
				'<a href="movie.php?id=' . $db_field['movie_id'] . '">' . $db_field['title'] . '</a>';
			echo '<p><strong>Description: </strong>' . $db_field['description'] . '</p></div>';

			// div 3 = more details + edit
			echo '<div><a href="movie.php?id=' . $db_field['movie_id'] . '">Details</a><br>';
			// $query = "SELECT * FROM `movies` WHERE product_id =".$_GET['id'];
			echo '<a href="add_movie.php?id=' . $db_field['movie_id'] . '">Edit</a></div>';
			echo '</div>';
			echo '<hr>';
		}
	} else {
		echo 'DB not found (' . DB_NAME . ')';
	}

	mysqli_close($connect);

	?>

	<!-- Synopsis (if more than 30char, display ‘...’)
● A "More info" or "Details" link leading to the film details page
● An "Edit" link leading to the film modification page
● An ‘Add to playlist’ button/icon (cf. section ‘playlist’) -->

</body>
</html>