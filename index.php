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

    $db_found = mysqli_select_db($connect, $db_name);

    if ($db_found) {
    echo '"$db_name found !<br>';
     } else {
    echo "Insert went wrong";
    }
  
    ?>
</body>
</html>