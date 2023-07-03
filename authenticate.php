<?php

include 'db_connect.php';

session_start();

if (!isset($_POST['username'], $_POST['password'])) {
    die('Please fill both username and password field!');
}

if ($stmt = $con->prepare('SELECT user_id, user_password FROM user_account WHERE user_username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashedPassword);
        $stmt->fetch();

        if (password_verify($_POST['password'], $hashedPassword)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['fullname'] = $_POST['user_fullname'];
            $_SESSION['id'] = $id;
            header('Location: home_user.php');
            exit();
        } else {
            echo 'Incorrect password!';
        }
    } else {
        echo 'Incorrect username!';
    }
    $stmt->close();
}

?>
