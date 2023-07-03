<?php

    $userID = $_POST['user_id'];

    include 'db_connect.php';

    $query= "INSERT INTO attendance (user_id, date, time) VALUES ('$userID', CURDATE(), CURTIME())";

    if($con->query($query) === TRUE) {
        echo "Attendance recorded successfully!";
    } else {
        echo "Error!" . $con->error;
    }

    $con->close();
?>