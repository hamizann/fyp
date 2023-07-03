<?php

include 'db_connect.php';

if ($_FILES["pdfFile"]["error"] == UPLOAD_ERR_OK) {
  $tmp_name = $_FILES["pdfFile"]["tmp_name"];
  $name = $_FILES["pdfFile"]["name"];

  // Specify the desired directory to save the uploaded PDF file
  $upload_directory = "\slides";

  // Move the temporary file to the desired directory
  move_uploaded_file($tmp_name, $upload_directory . $name);

  // Get the file content
  $fileContent = file_get_contents($upload_directory . $name);

  // Prepare the SQL statement
  $sql = "INSERT INTO slide (slide_title, slide_file) VALUES (?, ?)";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("ss", $name, $fileContent);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    echo "File uploaded and stored in the database successfully.";
  } else {
    echo "Error storing file in the database. Please try again.";
  }

  $stmt->close();
} else {
  echo "Error uploading file. Please try again.";
}

$con->close();
?>



/////
////
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the uploaded slide file
    $slideFile = $_FILES['slide']['tmp_name'];
    $slideFileName = $_FILES['slide']['name'];

    // Get the uploaded video file
    $videoFile = $_FILES['video']['tmp_name'];
    $videoFileName = $_FILES['video']['name'];

    // Read the contents of the slide file
    $slideContent = file_get_contents($slideFile);

    // Read the contents of the video file
    $videoContent = file_get_contents($videoFile);

    // Prepare and execute the SQL query to insert the files into the database
    $query = "INSERT INTO week (week, week_slide, week_video) VALUES ('Week 1', ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ss", $slideContent, $videoContent);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Files uploaded and stored successfully.";
    } else {
        echo "Error storing files: " . mysqli_error($con);
    }

    // Close the statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}

?>
