<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MOR - Free and Fairly Legal Movie Database</title>
</head>

<body>

    <?php

    require_once 'nav.html';

    require_once 'db_connect.php';
    // var_dump($connect);
    echo '<p class="home">Hi, please <a href="login.php">login</a> or <a href="registration.php">register</a>.</p>';

    ?>

</body>

</html>