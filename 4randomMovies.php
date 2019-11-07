<?php

    require_once 'db_connect.php';

    if ($connect) {
        $sql_query = 'SELECT * FROM movies ORDER BY RAND() LIMIT 4';
        $result_query = mysqli_query($connect, $sql_query);
        while ($db_field = mysqli_fetch_assoc($result_query)) {
            echo '<div style="display:flex; justify-content: center; margin-top: 20px">';
                echo '<div>#' . $db_field['category_id'] . '<br>';
                echo '<strong>Title: </strong>' . $db_field['title'] . '<br>';
                echo '<strong>Description: </strong>' . $db_field['description'] . '</div>';
            echo '</div>';
            echo '<hr>';
        }
    } else {
        echo 'DB not found (' . DB_NAME . ')';
    }

mysqli_close($connect);
