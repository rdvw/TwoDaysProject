<?php
session_start();
setcookie('staylogin','',time()-1);
session_destroy();
header("Location: index.php");
?>