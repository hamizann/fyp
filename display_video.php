<?php

include 'db_connect.php';

// Retrieve the video information from the database
$sql = "SELECT * FROM week1_video ORDER BY week1_video_id DESC LIMIT 1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $videoPath = $row["week1_video_path"];

    // Display the video
    echo "<video src='$videoPath' type='video/mp4' controls autoplay></video>";
} else {
    echo "No videos found.";
}

$con->close();
?>
