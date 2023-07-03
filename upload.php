<?php
include 'db_connect.php';

if (isset($_POST["submit"])) {
    // File title
    $title = $_POST["title"];

    // File details
    $file = $_FILES["file"];
    $filename = $file["name"];
    $tempFilePath = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileType = $file["type"];

    // Check if a file is selected
    if ($fileSize > 0) {
        // Generate a unique file name
        $uniqueName = uniqid().'_'.$filename;

        // Specify the upload directory path
        $uploadDirectory = "slides/";

        // Final file path
        $finalFilePath = $uploadDirectory . $uniqueName;

        // Check if the file is a PDF
        if ($fileType !== "application/pdf") {
            echo "Only PDF files are allowed.";
            exit();
        }

        // Move the temporary file to the upload directory
        if (move_uploaded_file($tempFilePath, $finalFilePath)) {
            // Prepare the values for database insertion
            $escapedTitle = mysqli_real_escape_string($con, $title);
            $escapedFilePath = mysqli_real_escape_string($con, $finalFilePath);

            // Insert PDF information into the database
            $sql = "INSERT INTO week1_slide (week1_slide_title, week1_slide_pdf_path) VALUES ('$escapedTitle', '$escapedFilePath')";
            if (mysqli_query($con, $sql)) {
                echo "File successfully uploaded.";
            } else {
                echo "Error inserting file information into the database: " . mysqli_error($con);
            }
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "Please select a file.";
    }
}
?>
