<?php
    session_start();
    if (!isset($_SESSION['login'])) {
      header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
	<title>Categories List</title>
</head>

<body>
	<?php
	require_once 'nav.html';
	?>

	<h1>Categories list</h1>
	<hr>

	<?php

	require_once 'db_connect.php';

	$query = 'SELECT * FROM categories ORDER BY title';
	$result_query = mysqli_query($connect, $query);
	echo 'Category: <select name="category">';
	while ($res = mysqli_fetch_assoc($result_query)) {
		echo '<option value="' . $res['category_id'] . '">' . $res['title'] . '</option>';
	}
	echo '</select><br>';


	if ($connect) {

		$sql_query = 'SELECT * FROM categories ORDER BY title';
		$result_query = mysqli_query($connect, $sql_query);
		while ($db_field = mysqli_fetch_assoc($result_query)) {

			echo '<div>#' . $db_field['category_id'] . '<br>';
			echo '<strong>Title: </strong>' . $db_field['title'] . '<br>';
			echo '<strong>Description: </strong>' . $db_field['description'] . '<br>';
			echo '<a href="edit_category.php?id=' . $db_field['category_id'] .  '">edit</a></div>';

			echo '<hr>';
		}
	} else {
		echo 'DB not found (' . DB_NAME . ')';
	}

	mysqli_close($connect);

	?>

</body>

</html>