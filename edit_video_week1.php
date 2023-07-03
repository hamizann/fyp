<?php
// Check if the slide ID is provided in the URL
if (isset($_GET['id'])) {
    // Retrieve the slide ID from the URL
    $video_id = $_GET['id'];

    // Database connection
    include 'db_connect.php';

    // Retrieve the video details from the database based on the video ID
    $query = "SELECT * FROM week1_video WHERE week1_video_id = '$video_id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the slide details
        $row = mysqli_fetch_assoc($result);
        $video_title = $row['week1_video_title'];
        // Add more fields as needed

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the updated video details from the form
            $updated_video_title = $_POST['week1_video_title'];
            // Add more fields as needed

            // File upload handling
            if (isset($_FILES['week1_video_path']) && $_FILES['week1_video_path']['error'] === UPLOAD_ERR_OK) {
                $video_title = $_FILES['week1_video_path']['name'];
                $video_file_tmp = $_FILES['week1_video_path']['tmp_name'];
                $video_file_size = $_FILES['week1_video_path']['size'];
                $video_file_type = $_FILES['week1_video_path']['type'];

                // Specify the directory where the uploaded file will be stored
                $uploads_dir = "videos";

                // Generate a unique filename to avoid overwriting existing files
                $video_file_path = $uploads_dir . '/' . uniqid() . '_' . $video_title;

                // Move the uploaded file to the designated directory
                if (move_uploaded_file($video_file_tmp, $video_file_path)) {
                    // Update the slide details in the database, including the file path
                    $update_query = "UPDATE week1_video SET week1_video_title = '$updated_video_title', week1_video_path = '$video_file_path' WHERE week1_video_id = '$video_id'";
                    $update_result = mysqli_query($con, $update_query);

                    if ($update_result) {
                        echo "Video details updated successfully in Week 1.";
                    } else {
                        echo "Error updating video details: " . mysqli_error($con);
                    }
                } else {
                    echo "Error uploading the file.";
                }
            } else {
                echo "Error uploading the file: " . $_FILES['week1_video_path']['error'];
            }
        }
    } else {
        echo "Videos not found.";
    }

    // Close the database connection
    mysqli_close($con);
} else {
    // If slide ID is not provided in the URL, handle the error or redirect to an appropriate page
    echo "Video ID not provided.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Video</title>
</head>
<body>
    <h2>Edit Video</h2>
    <?php if (isset($video_id)): ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="week1_video_title">Video Title:</label>
        <input type="text" name="week1_video_title" value="<?php echo $video_title; ?>"><br>
        
        <label for="week1_video_path">Upload File:</label>
        <input type="file" name="week1_video_path"><br>
        
        <input type="submit" value="Update">
    </form>
    <?php endif; ?>
</body>
</html>
