<?php
    require_once 'db_connect.php';
    $query = "SELECT * FROM `movies` WHERE product_id =".$_GET['id'];
    $result_query = mysqli_query($connect, $query);
    $res = mysqli_fetch_assoc($result_query);
    echo '<img width="100px" src="img/'.$res['picture'].'"><br>';
    echo '<a href="'.$res['local_path'].'">'.$res['title'].'</a>';
    echo $res['category_id'];
    echo 'Sortie en '.$res['release-year'];
    echo $res['description'];
    echo $res['local_path'];
?>