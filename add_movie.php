<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add a Movie</title>
</head>
<body>
<?php
    include_once('nav.html');
    require_once 'db_connect.php';
    $title = '';
    $description = '';
    $picture = '';
    $release_year = '';
    $local_path = '';
    $category = '';

    if(isset($_GET['id'])){
        $query = "SELECT * FROM `movies` WHERE movie_id =".$_GET['id'];
        $result_query = mysqli_query($connect, $query);
        $res = mysqli_fetch_assoc($result_query);
        $title = $res['title'];
        $description = $res['description'];
        $picture = $res['picture'];
        $release_year = $res['release_year'];
        $local_path = $res['local_path'];
        $category = $res['category_id'];
    }
?>
<form action="#" method="POST">
    
    Title: <input type="text" name="title" value="<?php echo $title ?>" required><br>
    Description: <input type="text" name="description" value="<?php echo $description ?>" required><br>
    Picture: <input type="text" name="picture" value="<?php echo $picture ?>"required><br>
    Release Year: <input type="number" name="release_year"  value="<?php echo $release_year ?>"required><br>
    Local Path: <input type="text" name="local_path"  value="<?php echo $local_path ?>" required><br>
    <?php
        $query = 'SELECT * FROM categories ORDER BY title';
        $result_query = mysqli_query($connect, $query);
        echo 'Category: <select name="category" value="'.$category.'">';
        while($res = mysqli_fetch_assoc($result_query)){
            if($category==$res['category_id']){
                echo '<option selected value="'.$res['category_id'].'">'.$res['title'].'</option>';
            }else{
                echo '<option value="'.$res['category_id'].'">'.$res['title'].'</option>';
            }
        }
        echo '</select><br>';
    ?>
    <input type="submit" name="submit" value="<?php echo isset($_GET['id']) ? "Edit the movie":"Add a movie"?>">
</form>    
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $picture = $_POST['picture'];
        $release_year = $_POST['release_year'];
        $local_path = $_POST['local_path'];
        $category = $_POST['category'];
        if(isset($_GET['id'])){
            $query = "UPDATE movies SET title='$title',description='$description',picture='$picture',release_year=$release_year,local_path='$local_path',category_id=$category WHERE product_id =".$_GET['id'];
            $result_query = mysqli_query($connect, $query);
            if($result_query){
                echo '<br>';
                echo 'Successfully update the movie.';
            }else{
                echo '<br>';
                echo 'Something went wrong. Try again...';
            }
        }else{
            if(empty($title) || empty($description) || empty($picture) || empty($release_year) || empty($local_path) || empty($category)){
                echo 'Missing same details. Try again...';
            }else{
                $query = "INSERT INTO movies(title, description, picture, release_year, local_path, category_id) VALUES('$title', '$description', '$picture', $release_year,'$local_path',$category)";
                $result_query = mysqli_query($connect, $query);
                if ($result_query){
                    echo '<br>';
                    echo 'Successfully registered new movie.';
                }else{
                    echo '<br>';
                    echo 'Something went wrong. Try again...';
                }
            }
        }
    }
    
    mysqli_close($connect);
    ?>