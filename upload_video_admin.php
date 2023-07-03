<?php

include 'db_connect.php';

// Check if a file was uploaded
if ($_FILES["videoFile"]["error"] == UPLOAD_ERR_OK) {
    // Retrieve the temporary file path
    $tmpFilePath = $_FILES["videoFile"]["tmp_name"];

    // Check the file extension
    $fileExtension = strtolower(pathinfo($_FILES["videoFile"]["name"], PATHINFO_EXTENSION));
    $allowedExtensions = array("mp4");

    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "Invalid file extension. Only MP4 files are allowed.";
        exit();
    }

    // Generate a unique name for the file
    $fileName = uniqid() . "_" . $_FILES["videoFile"]["name"];

    // Specify the directory where the file will be saved
    $uploadDirectory = "videos/";

    // Move the file to the upload directory
    $uploadedFilePath = $uploadDirectory . $fileName;
    if (move_uploaded_file($tmpFilePath, $uploadedFilePath)) {
        // File upload success, insert the file path into the database
        $sql = "INSERT INTO week (week_video) VALUES ('$uploadedFilePath')";
        if ($con->query($sql) === TRUE) {
            echo "File uploaded successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        echo "File upload failed.";
    }
} else {
    echo "Error uploading file: " . $_FILES["videoFile"]["error"];
}

// Close the database connection
$con->close();
?>
