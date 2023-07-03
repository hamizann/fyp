<?php

$targetDirectory = "path/to/directory/";
$filename = $_FILES["file"]["name"];
$targetFilePath = $targetDirectory . $filename;

if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
  // File uploaded successfully, continue with saving the file path in the database
} else {
  // Error uploading the file
}

$insertQuery = "INSERT INTO file (filw_name, file_path) VALUES ('$filename', '$targetFilePath')";
mysqli_query($con, $insertQuery);


?>