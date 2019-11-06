<?php
if (isset($_COOKIE['staylogin'])) {
    $_SESSION['login'] = $_COOKIE['staylogin'];
}
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
        require_once 'database_acces.php';
        if ($isValidMail) {
            $query = "SELECT * FROM `users` WHERE `email` = '$isValidMail'";
            $result_query = mysqli_query(CONNECT, $query); 
            if($result_query -> num_rows !=0){
                $res = mysqli_fetch_assoc($result_query);
                if(password_verify($password, $res['password'])){
                    $_SESSION['login'] = $res['email'];
                    if($check){
                        setcookie('staylogin','login',time()+(3600*24*30));
                    }
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