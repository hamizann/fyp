<?php

include 'db_connect.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    //retrieve video info from db
    $selectQuery = "SELECT week1_video_path FROM week1_video WHERE week1_video_id = $id";
    $result = mysqli_query($con, $selectQuery);

    if($result){
        $row = mysqli_fetch_assoc($result);
        $filePath = $row['week1_video_path'];

        //delete vide from db
        $deleteQuery = "DELETE FROM week1_video WHERE week1_video_id = $id";
        $deleteResult = mysqli_query($con, $deleteQuery);

        if($deleteResult) {
            //delete the video from server
            if(unlink($filePath)) {
                echo "Video deleted successfully.";
            } else {
                echo "Error deleting video file.";
            }
        } else {
            echo "Error deleting video: " . mysqli_error($con);
        }
    } else {
        echo "Video not found in the database.";
    }

}

mysqli_close($con);

?>