<?php

    include 'db_connect.php';

    session_start();

    if(!isset($_POST['admin_username'], $_POST['admin_password'])) {
        die('Please fill in both the username and password field!');
    }

    if($stmt = $con->prepare('SELECT admin_id, admin_password FROM admin_account WHERE admin_username = ? ')) {
        $stmt->bind_param('s', $_POST['admin_username']);
        $stmt->execute();

        $stmt->store_result();
        if($stmt->num_rows > 0) {
            $stmt->bind_result($id1, $password1);
            $stmt->fetch();

            if($_POST['admin_password'] === $password1) {
                session_regenerate_id();
                $_SESSION['loggedin1'] = TRUE;
                $_SESSION['name1'] = $_POST['admin_username'];
                $_SESSION['admin_id'] = $id1;
                header('Location: home_admin.php');
            } else {
                echo 'Incorrect password!';
            }

        } else {
            echo 'Incorrect username!';
        }

        $stmt->close();
    }

    

?>