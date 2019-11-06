<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MOR - Register</title>
</head>

<body>

    <?php

    session_start();

    require_once 'nav.html';

    /* these are the db fields icymi:
    user_id
    firstname
    lastname
    email
    password
    */

    $firstname = '';
    $lastname = '';
    $email = '';
    $password = '';

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $sanitizeMail = filter_var($email, FILTER_SANITIZE_EMAIL);
        $sanitizeMail = filter_var($email, FILTER_VALIDATE_EMAIL);


        if (empty($email) || empty($password) || empty($firstname) || empty($lastname)) {
            echo 'You must fill every fields';
        } elseif (!$sanitizeMail) {
            echo 'You must enter a valid email';
        } else {

            require_once 'db_connect.php';

            $securePassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users(firstname, lastname, email, password)
      VALUES('$firstname', '$lastname', '$sanitizeMail', '$securePassword')";

            // Send an SQL request to our DB
            $result_query = mysqli_query($connect, $query);

            // Check if the user was successfully registered 
            if ($result_query)
                echo 'Successfully registered. You can now <a href="login.php">login</a>.';
            else
                echo 'Something went wrong. Try again...';
        }
    }

    ?>

    <h1>Register to the website</h1>
    <br>
    <form action="" method="post">
        <input type="text" name="firstname" value="<?php echo $firstname ?>"><br>
        <input type="text" name="lastname" value="<?php echo $lastname ?>"><br>
        <input type="text" name="email" value="<?php echo $email ?>"><br>
        <input type="password" name="password" value="<?php echo $password ?>"><br>
        <input type="submit" name="submit" value="Register">
    </form>

</body>

</html>