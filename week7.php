<?php
session_start();


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title >FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />       
    </head>

    <style>
        .button {
          background-color: #25a2aa;
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }
       
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #25a2aa;
        }

        li a {
            display: block;
            color: #000;
            padding: 8px 0 8px 16px;
            text-decoration: none;
        }

        /* Change the link color on hover */
        li a:hover {
            background-color: #555;
            color: white;
        }

        nav {
            background-color: #25a2aa;
        }

        footer {
            background-color: #25a2aa;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
    </style>

    <body>

    <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container px-lg-1">
                <a href="home_user.php" class="navbar-brand fs-3 fw-bold" ><img src="img\favicon.ico">FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item fs-5"><a class="nav-link" href="profile_page_user.php">Profile</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="course_page.php">Course</a></li>
                            <li><a class="dropdown-item" href="question_page.php">Question</a></li>
                            <li><a class="dropdown-item" href="quiz_page.php">Quiz</a></li>
                            <li><a class="dropdown-item" href="answer_page.php">Answer</a></li>
                            <li><a class="dropdown-item" href="attendance_page.php">Attendance</a></li>
                        </ul>
                        <li class="nav-item fs-5"><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </nav>

        <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Week 7 - Course Materials  </h1>
            <p class="lead">This is the course page where you can access each Week 7 study materials.</p>
            <hr class="hr"/>
        </div>
    </div>

    <div class="container">
    <?php
    $directory = "slides w7/"; // Directory where the files are stored

    // Get the latest file in the directory
    $latestFile = null;
    $latestTime = 0;

    if ($handle = opendir($directory)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {
                $filePath = $directory . $file;
                $fileTime = filemtime($filePath);

                if ($fileTime > $latestTime) {
                    $latestTime = $fileTime;
                    $latestFile = $filePath;
                }
            }
        }
        closedir($handle);
    }

    if ($latestFile) {
        // Display the file to the user
        echo '<div class="text-center">';
        echo '<embed src="' . $latestFile . '" type="application/pdf" width="800" height="600" />';
        echo '</div>';

        // Add a download button
        echo '<div class="text-center mt-4">';
        echo '<a href="' . $latestFile . '" class="button">Download</a>';
        echo '</div>';
    } else {
        echo '<p>No file found.</p>';
    }
    ?>
</div>

<div class="container">
    <?php
    // Specify the directory path where your video files are stored
    $directory = "videos w7/";

    // Initialize variables to track the latest file and its modification time
    $latestFile = "";
    $latestTime = 0;

    // Open the directory
    if ($handle = opendir($directory)) {
        // Loop through each file in the directory
        while (false !== ($file = readdir($handle))) {
            // Skip the "." and ".." entries
            if ($file != "." && $file != "..") {
                // Construct the full file path
                $filePath = $directory . $file;
                // Check if the file is a video file (you can customize this condition based on your video file types)
                if (is_file($filePath) && in_array(strtolower(pathinfo($filePath, PATHINFO_EXTENSION)), array("mp4", "mov", "avi"))) {
                    // Get the file's modification time
                    $fileTime = filemtime($filePath);

                    // Check if the current file is the latest
                    if ($fileTime > $latestTime) {
                        $latestFile = $filePath;
                        $latestTime = $fileTime;
                    }
                }
            }
        }
        // Close the directory
        closedir($handle);
    }

    // Check if a latest video file was found
    if ($latestFile) {
        // Display the video player with the latest video file
        echo '<video controls style="width: 90%; height: auto;">
                <source src="' . $latestFile . '" type="video/mp4">
              </video>';
    } else {
        echo '<p>No video file found.</p>';
    }
    ?>
</div>

    <div class="container">
    <?php
        include 'db_connect.php';
        // Retrieve the latest QR code details from the database
        $query = mysqli_query($con, "SELECT qr_text, qr_image FROM qr_code ORDER BY qr_id DESC LIMIT 1");
        if ($query) {
            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                $qrtext = $row['qr_text'];
                $qrimage = 'qr_images/' . $row['qr_image'];

                // Display the QR code image to the user
                echo "<h3>QR Code:</h3>";
                echo "<img src='$qrimage' alt='QR Code'>";
                // echo "<p>QR Text: $qrtext</p>";
            } else {
                echo "No QR code available.";
            }
        } else {
            echo "Error executing the query: " . mysqli_error($con);
        }
    ?>
    </div>


<br>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Week 7 - Quiz  </h1>
            <p class="lead">Complete this quiz to test your understanding of this week's topic.</p>
            <hr class="hr"/>
        </div>
        <div class="col-md-12 text-center">
        <a href="quiz_user_w7.php" class="button">Quiz</a>
        </div>
    </div>
    
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Week 7 - Q&A  </h1>
            <p class="lead">Ask any questions related to this week's materials.</p>
            <hr class="hr"/>
        </div>
        <div class="col-md-12 text-center">
        <a href="q&a7_page.php" class="button">Q&A</a>
        <hr class="hr"/>
        </div>
        <div class="container">
            <p class="lead">View the answers for your questions.</p>
            <div class="col-md-12 text-center">
        <a href="view_q&a7_answer.php" class="button">View Answer</a>
        </div>
        </div>
    </div>
    <br><br><br>
        <div>
            <!-- Footer-->
            <footer class="py-3">
                <div class="container"><p class="m-0 text-center text-white">&copy; Fundamental Online Guided Module to Perform Hajj and Umrah</p></div>
            </footer>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
        </div>

    </body>
</html>
