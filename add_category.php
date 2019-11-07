<?php
    session_start();
    if (!isset($_SESSION['login'])) {
      header("Location: index.php");
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
    ?>

    <form action="#" method="POST">
        Title: <input type="text" name="title"><br>
        Description: <input type="text" name="description"><br>
        <input type="submit" name="submit" value="Add the category">
    </form>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    var_dump($_POST);
    if (empty($title)) {
        echo 'The title is missing. Please try again...';
    } else {
        if (empty($description)) {
            echo 'The description is missing. Please try again...';
        } else {
            $query = "INSERT INTO categories(title, description) VALUES('$title', '$description')";
            $result_query = mysqli_query($connect, $query);
            if ($result_query)
                echo 'The category was added successfully.';
            else
                echo 'Something went wrong. Please try again...';
        }
    }
}

mysqli_close($connect);

?>