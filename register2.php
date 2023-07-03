<?php
session_start();
include 'db_connect.php';

if (!isset($_POST['username'], $_POST['fullname'], $_POST['phonenumber'], $_POST['email'], $_POST['dateOfBirth'], $_POST['password'], $_POST['password2'])) {
    exit('Please complete the form');
}

if (empty($_POST['username']) || empty($_POST['fullname']) || empty($_POST['phonenumber']) || empty($_POST['email']) || empty($_POST['dateOfBirth']) || empty($_POST['password']) || empty($_POST['password2'])) {
    exit('Please complete the form');
}

// Check email validation
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Email is not valid!');
}

// Check password length
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    exit('Password must be between 5 and 20 characters long');
}

// Check if passwords match
if ($_POST['password'] !== $_POST['password2']) {
    exit('Passwords do not match!');
}

// Check username existence
if ($stmt = $con->prepare('SELECT user_id, user_password FROM user_account WHERE user_username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo 'Username already exists, please choose another';
    } else {
        // Hash the password
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if ($stmt = $con->prepare('INSERT INTO user_account (user_username, user_fullname, user_email, user_password, user_phoneNo, user_dateOfBirth) VALUES (?,?,?,?,?,?)')) {
            $stmt->bind_param('ssssss', $_POST['username'], $_POST['fullname'], $_POST['email'], $password, $_POST['phonenumber'], $_POST['dateOfBirth']);
            $stmt->execute();
            echo 'You have successfully registered';
            header('Location: login_user.php');
        } else {
            echo 'Could not prepare statement';
        }
    }
    $stmt->close();
} else {
    echo 'Could not prepare statement!';
}
$con->close();
?>
