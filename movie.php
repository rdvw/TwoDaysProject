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
    $query = "SELECT * FROM `movies` WHERE movie_id =".$_GET['id'];
    $result_query = mysqli_query($connect, $query);
    $res = mysqli_fetch_assoc($result_query);
    echo '<div style="display:flex; justify-content: center; margin-top: 20px">';
    echo '<div style="margin-right:50px">';
    echo '<img width="300px" src="'.$res['picture'].'"><br>';
    echo 'Sortie en '.$res['release_year'];
    echo '</div>';
    echo '<div>';
    echo '<div style="margin-bottom:10px">';
    echo '<a href="'.$res['local_path'].'">'.$res['title'].'</a>';
    //echo $res['category_id'];
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