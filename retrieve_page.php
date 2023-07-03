<?php

    include 'db_connect.php';

    $id =1; //unique identifier

    $query = "SELECT slide_file FROM slide WHERE slide_id= $id";
    $result = mysqli_query($con, $query);

    if(!$result) {
        die("Query failed: " . mysqli_error($con));

    }

    $row = mysqli_fetch_assoc($result);
    $file = $row['slide_file'];

    mysqli_free_result($result);
    mysqli_close($con);

    // Display the PDF using an embedded object
    echo '<embed src="data:application/pdf;base64,' . base64_encode($file) . '" width="100%" height="600px" type="application/pdf">';

// header('Content-type: application/pdf');
// header('Content-Disposition: inline; filename="document.pdf"');
// header('Content-Length: ' . strlen($file));

// echo $file;
?>
