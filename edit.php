<?php
// Check if the slide ID is provided in the URL
if (isset($_GET['id'])) {
    // Retrieve the slide ID from the URL
    $slide_id = $_GET['id'];

    // Database connection
    include 'db_connect.php';
    include 'upload.php';

    // Retrieve the slide details from the database based on the slide ID
    $query = "SELECT * FROM week1_slide WHERE week1_slide_id = '$slide_id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the slide details
        $row = mysqli_fetch_assoc($result);
        $slide_title = $row['week1_slide_title'];
        // Add more fields as needed

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the updated slide details from the form
            $updated_slide_title = $_POST['week1_slide_title'];
            // Add more fields as needed

            // File upload handling
            if (isset($_FILES['week1_slide_file']) && $_FILES['week1_slide_file']['error'] === UPLOAD_ERR_OK) {
                $file_name = $_FILES['week1_slide_file']['name'];
                $file_tmp = $_FILES['week1_slide_file']['tmp_name'];
                $file_size = $_FILES['week1_slide_file']['size'];
                $file_type = $_FILES['week1_slide_file']['type'];

                // Specify the directory where the uploaded file will be stored
                $uploads_dir = "slides";

                // Generate a unique filename to avoid overwriting existing files
                $file_path = $uploads_dir . '/' . uniqid() . '_' . $file_name;

                // Move the uploaded file to the designated directory
                if (move_uploaded_file($file_tmp, $file_path)) {
                    // Update the slide details in the database, including the file path
                    $update_query = "UPDATE week1_slide SET week1_slide_title = '$updated_slide_title', week1_slide_file = '$file_path' WHERE week1_slide_id = '$slide_id'";
                    $update_result = mysqli_query($con, $update_query);

                    if ($update_result) {
                        echo "Slide details updated successfully.";
                    } else {
                        echo "Error updating slide details: " . mysqli_error($con);
                    }
                } else {
                    echo "Error uploading the file.";
                }
            } else {
                echo "Error uploading the file: " . $_FILES['week1_slide_file']['error'];
            }
        }
    } else {
        echo "Slide not found.";
    }

    // Close the database connection
    mysqli_close($con);
} else {
    // If slide ID is not provided in the URL, handle the error or redirect to an appropriate page
    echo "Slide ID not provided.";
}
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
                <a href="home_admin.php" class="navbar-brand fs-3 fw-bold" ><img src="img\favicon.ico"> FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item fs-5"><a class="nav-link" href="profile_user.php">Profile</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="course_admin.php">Course</a></li>
                            <li><a class="dropdown-item" href="question_page.php">Question</a></li>
                            <li><a class="dropdown-item" href="quiz_page.php">Quiz</a></li>
                            <li><a class="dropdown-item" href="answer_page.php">Answer</a></li>
                            <li><a class="dropdown-item" href="attendance_page.php">Attendance</a></li>
                            <!-- <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                        <li class="nav-item fs-5"><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </nav>
        <h1 class="display-4">Edit File  </h1>
    <?php if (isset($slide_id)): ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="week1_slide_title">Slide Title:</label>
        <input type="text" name="week1_slide_title" value="<?php echo $slide_title; ?>"><br><br>
        
        <label for="week1_slide_file">Upload File:</label>
        <input type="file" name="week1_slide_file"><br><br>
        
        <input type="submit" class="button" value="Update">
    </form>
    <?php endif; ?>

    </div>
        <!-- Footer-->
        <footer class="py-3">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Fundamental Online Guided Module to Perform Hajj and Umrah</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </div>
</body>
</html>
