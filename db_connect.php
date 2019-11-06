<?php

    require_once 'database.php';

    define('CONNECT', mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME));

?>