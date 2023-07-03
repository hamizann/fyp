<?php
// Include the database connection file
include 'db_connect.php';

// Check if the login form was submitted
if (isset($_POST['login'])) {
    // Retrieve the entered username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize the inputs to prevent SQL injection
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    // Retrieve the user account based on the entered username
    $sql = "SELECT * FROM user_account WHERE user_username = '$username'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    // Check if a matching user account was found
    if ($row) {
        // Verify the entered password against the stored password hash
        if (password_verify($password, $row['user_password'])) {
            // Start the session and store relevant user information
            session_start();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['user_username'];

            // Redirect the user to the quiz page
            header('Location: home_user.php');
            exit();
        } else {
            // Invalid password
            echo "<h1>Login failed. Invalid username or password</h1>";
        }
    } else {
        // User account not found
        echo "<h1>Login failed. Invalid username or password</h1>";
    }
}
?>
