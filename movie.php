<?php
    session_start();
    if (isset($_COOKIE['staylogin'])) {
        $_SESSION['login'] = $_COOKIE['staylogin'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
</head>
<body>
<?php
    include_once('nav.html');
    require_once 'db_connect.php';
    $query = "SELECT m.title, m.description, m.picture, m.release_year, m.local_path, cat.title as category FROM movies m INNER JOIN categories cat ON cat.category_id = m.category_id WHERE movie_id=".$_GET['id'];
    $result_query = mysqli_query($connect, $query);
    $res = mysqli_fetch_assoc($result_query);
    echo '<div style="display:flex; justify-content: center; margin-top: 20px">';
    echo '<div style="margin-right:50px">';
    echo '<img width="300px" src="'.$res['picture'].'"><br>';
    echo 'Sortie en '.$res['release_year'];
    echo '</div>';
    echo '<div>';
    echo '<div style="display:flex; margin-bottom:10px">';
    echo '<a style="padding-right:50px" href="'.$res['local_path'].'">'.$res['title'].'</a>';
    echo $res['category'];
    echo '</div>';
    echo '<div>';
    echo $res['description'].'<br><br>';
    echo $res['local_path'];
    echo '</div>';
    echo '</div>';
    echo '</div>';
    mysqli_close($connect);
?>
</body>
</html>