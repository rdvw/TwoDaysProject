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
?>
<form action="#" method="POST">
    Title: <input type="text" name="title" required><br>
    Description: <input type="text" name="description" required><br>
    Picture: <input type="text" name="picture" required><br>
    Release Year: <input type="number" name="release_year" required><br>
    Local Path: <input type="text" name="local_path" required><br>
    <?php
        $query = 'SELECT * FROM categories ORDER BY title';
        $result_query = mysqli_query($connect, $query);
        echo 'Category: <select name="category">';
        while($res = mysqli_fetch_assoc($result_query)){
            echo '<option value="'.$res['category_id'].'">'.$res['title'].'</option>';
        }
        echo '</select><br>';
    ?>
    <input type="submit" name="submit" value="Add a movie">
</form>    
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        var_dump($_POST);
        echo '<hr>';
        $title = $_POST['title'];
        $description = $_POST['description'];
        $picture = $_POST['picture'];
        $release_year = $_POST['release_year'];
        $local_path = $_POST['local_path'];
        $category = $_POST['category'];
        if(empty($title) || empty($description) || empty($picture) || empty($release_year) || empty($local_path) || empty($category)){
            echo 'Missing same details. Try again...';
        }else{
            $query = "INSERT INTO movies(title, description, picture, release_year, local_path, category_id) VALUES('$title', '$description', '$picture', $release_year,'$local_path',$category)";
            if ($result_query)
                echo 'Successfully registered new movie.';
            else
                echo 'Something went wrong. Try again...';
        }
    }


    mysqli_close($connect);

?>



