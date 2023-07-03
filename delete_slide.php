<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve PDF file path from the database
    $selectQuery = "SELECT week1_slide_pdf_path FROM week1_slide WHERE week1_slide_id = $id";
    $result = mysqli_query($con, $selectQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $filePath = $row['week1_slide_pdf_path'];

        // Delete PDF record from the database
        $deleteQuery = "DELETE FROM week1_slide WHERE week1_slide_id = $id";
        $deleteResult = mysqli_query($con, $deleteQuery);

        if ($deleteResult) {
            // Delete the PDF file from the server
            if (file_exists($filePath) && unlink($filePath)) {
                echo "PDF deleted successfully.";
            } else {
                echo "Error deleting PDF file or file does not exist.";
            }
        } else {
            echo "Error deleting PDF: " . mysqli_error($con);
        }
    } else {
        echo "PDF not found in the database.";
    }
}

mysqli_close($con);
?>
