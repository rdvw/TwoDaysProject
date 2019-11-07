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
    <title>Add a category</title>
</head>

<body>

    <?php
    include_once('nav.html');

    require_once 'db_connect.php';

    $title = '';
    $description = '';
    if (isset($_GET['id'])) {
        $query = "SELECT * FROM categories WHERE category_id =" . $_GET['id'];
        $result_query = mysqli_query($connect, $query);
        $result = mysqli_fetch_assoc($result_query);
        $title = $result['title'];
        $description = $result['description'];
    }
    ?>

    <form action="#" method="POST">
        Title: <input type="text" name="title" value="<?php echo $title ?>" required><br>
        Description: <input type="text" name="description" value="<?php echo $description ?>" required><br>
        <input type="submit" name="submit" value="Edit the category">
    </form>

</body>

</html>


<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    if (isset($_GET['id'])) {
        $query = "UPDATE categories SET title='$title', description='$description' WHERE category_id =" . $_GET['id'];
        $result_query = mysqli_query($connect, $query);
        if ($result_query)
            echo 'The category was added successfully.';
        else
            echo 'Something went wrong. Please try again...';
    }
}

mysqli_close($connect);

?>