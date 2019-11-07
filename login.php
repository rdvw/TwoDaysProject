<?php
session_start();

$email = '';
$password = '';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $check = false;
    if(isset($_POST['rememberme'])){
        $check = true;
    }

    $sanitizedMail = filter_var($email, FILTER_SANITIZE_EMAIL);
    $isValidMail = filter_var($sanitizedMail,FILTER_VALIDATE_EMAIL);
    if (empty($email) || empty($password)) {
        echo 'email or password should be not empty';
    }else{
        require_once 'db_connect.php';
        if ($isValidMail) {
            $query = "SELECT * FROM `users` WHERE `email` = '$isValidMail'";
            $result_query = mysqli_query($connect, $query); 
            if($result_query -> num_rows !=0){
                $res = mysqli_fetch_assoc($result_query);
                if(password_verify($password, $res['password'])){
                    $_SESSION['login'] = $res['email'];
                    header("Location: home.php");
                }else{
                    echo '<br>Wrong Password';
                }
            }else{
                echo '<br>User not found';
            }
        }
        mysqli_close($connect);
    }
}