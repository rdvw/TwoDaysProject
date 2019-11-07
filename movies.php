<?php
    session_start();
    if (isset($_COOKIE['staylogin'])) {
        $_SESSION['login'] = $_COOKIE['staylogin'];
    }
?>
<!DOCTYPE html>
<html>

<head>
	<title>Movies List</title>
</head>
<script src=" https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
</script>

<body>
	<?php
	require_once 'nav.html';
	?>

	<?php
	// getting the categories from the backend
	require_once 'db_connect.php';
	if (!$connect) echo '!! Cannot get categories from backend.';
	$query = 'SELECT * FROM categories ORDER BY title';
	$result_query = mysqli_query($connect, $query);
	$categorySelectHTML = '<select name="category" id="category">';
	$categorySelectHTML .= '<option value="">all categories</option>';
	while ($res = mysqli_fetch_assoc($result_query)) {
		$categorySelectHTML .= '<option value="' . $res['category_id'] . '">' . $res['title'] . '</option>';
	}
	$categorySelectHTML .= '</select>';

	// getting the movie count if not already received
	$movieCount = $_SESSION['movieCount'] ?? '';
	if (!$movieCount) {
		$query = 'SELECT movie_id FROM movies';
		$result_query = mysqli_query($connect, $query);
		$movieCount = mysqli_num_rows($result_query);
		if (!$movieCount > 0) echo '!! No movies found in datase.';
		$_SESSION['movieCount'] = $movieCount;
		//echo 'movie count: ' . $movieCount;
	}

	?>

	<!-- // filter and sorting options -->
	<section id="filtersNorderings" style="display:flex;justify-content:space-around;">
		<form id="filterForm" action="movies.php" method="POST">
			Category:
			<?php echo $categorySelectHTML; ?>

			Sort by:
			<select name="sortBy" id="sortBy">
				<option value="release_year">release year</option>
				<option value="title">title</option>
			</select>

			Sorting:
			<select name="sorting" id="sorting">
				<option value="ASC">ascending (increasing)</option>
				<option value="DESC">descending (descreasing)</option>
			</select>
			<input type="submit" name="filtersNorderings" value="-> apply filter">
			<input type="number" name="paging" id="paging" style="width:2em;" value="0"># /page <br>
			<input type="hidden" name="page" id="page" style="width:2em;" value="1"> 
			<input type="hidden" name="movieCount" id="movieCount" style="width:3em;" value="<?php echo $movieCount; ?>"> 
		</form>

	</section>
	<div style="text-align:center;color:gray;" id="appliedFilter"></div>


	<?php

	if ($connect) {

		$paging = 0; // # of movies on one page (pagination)

		// this is the standard query
		$sql_query = 'SELECT * FROM movies ORDER BY title';
		// if no other query is transmitted by a form from another php-page.
		if (isset($_POST['queryFromHome'])) {
			$searchTerm = trim($_POST['queryFromHome']);
			$sql_query = "
			SELECT * FROM movies WHERE title LIKE '%$searchTerm%'";
		}
		if (isset($_POST['paging'])) {
			//var_dump($_POST);
			$category = $_POST['category'];
			$sortBy = $_POST['sortBy'];
			$sorting = $_POST['sorting'];
			$paging = $_POST['paging'];
			$page = $_POST['page'];
			$sql_query = "SELECT * FROM movies ";
			if ($category) $sql_query .= "WHERE category_id = " . $category . " ";
			$sql_query .= "ORDER BY " . $sortBy . " " . $sorting; // !! important: use apostophes instead of single quotes here!					
			if ($paging) $sql_query .= " LIMIT " . $paging . " OFFSET " . (($page - 1) * $paging);

			
			echo '
			<div id="pagination" style="display:flex;justify-content:space-around;margin:auto 40%;">
			<a id="pageLess" href="">&lt;&lt;&lt;</a>
			<span id="displayPageNumber">Page X </span>
			<a id="pageMore" href="">&gt;&gt;&gt;</a>
			</div>
			';

			echo '<script>
			$("#appliedFilter").html("' . $sql_query . '");
			$("#category").val("' . $category . '");
			$("#sortBy").val("' . $sortBy . '");
			$("#sorting").val("' . $sorting . '");
			$("#paging").val("' . $paging . '");				
			$("#page").val("' . $page . '");
			$("#displayPageNumber").html("Page ' . $page . '");
			</script>';

		}

		$result_query = mysqli_query($connect, $sql_query);
		if (!$result_query) echo '!! No results retrieved. SQL error: ' . mysqli_error($connect);

		echo '
		<h1>Movies list</h1>
		<hr>
		';

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
<script>
	$('#pageLess').click(function() {
		paging(-1);
		return false;
	});
	$('#pageMore').click(function() {
		paging(1);
		return false;
	});

	function paging(x) {
		currentPage = $('#page').val();
		moviesPerPage = parseInt($('#paging').val());
		futurePage = parseInt(currentPage) + x;
		movieCount = parseInt($('#movieCount').val());
		maxPage = parseInt(movieCount / moviesPerPage) + 1;
		if (futurePage && futurePage <= maxPage) {
			$('#page').val(futurePage);
			$('#filterForm').submit();
		}
	}
</script>

</html>