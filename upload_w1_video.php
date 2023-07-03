<?php

include 'db_connect.php';

if (isset($_FILES['videoFile'])) {
    $file = $_FILES['videoFile'];
    // Handle video upload
    $targetDirectory = "C:/xampp/htdocs/PSM1 Project/videos/";
    $targetFile = $targetDirectory . basename($_FILES["videoFile"]["name"]);
    $videoFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Allow only .mp4 videos
    if ($videoFileType !== "mp4") {
        echo "Only .mp4 videos are allowed.";
        exit();
    }

    // Prepare the values for database insertion
    $filename = $con->real_escape_string(uniqid() . "_" . $_FILES["videoFile"]["name"]);
    $filepath = $con->real_escape_string($targetFile);

    // Insert video information into the database
    $sql = "INSERT INTO week1_video (week1_video_title, week1_video_path) VALUES ('$filename', '$filepath')";

    if ($con->query($sql) === TRUE) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["videoFile"]["tmp_name"], $targetFile)) {
            echo "Video uploaded successfully.";
        } else {
            echo "Error moving uploaded video file.";
        }
    } else {
        echo "Error uploading video: " . $con->error;
    }

    $con->close();
}

?>
