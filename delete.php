
<?php
// Include the database connection file
include 'db_connect.php';

// Check if the ID parameter is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Display a confirmation message to the user
    echo '<script>
        var result = confirm("Are you sure you want to delete this record?");
        if (result) {
            // User confirmed deletion, proceed with the deletion
            window.location.href = "delete_slide.php?id=' . $id . '";
        } else {
            // User canceled deletion, redirect back to the previous page
            window.history.back();
        }
    </script>';
}
?>



