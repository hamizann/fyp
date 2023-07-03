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
                        <li class="nav-item fs-5"><a class="nav-link" href="profile_user.php">Profile</a></li>
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
                            <!-- <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                        <li class="nav-item fs-5"><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </nav>

        <?php

            session_start();
            require_once 'db_connect.php';

            if(!isset($_SESSION['loggedin'])) {
                header('Location: login_user.php');
                exit();
            }

            // Get the current user ID
            $userId = $_SESSION['loggedin'];
            $user_fullname = $_SESSION['loggedin'];

            if (isset($_POST['scanned_qr_text'])) {
                $scanned_qr_text = $_POST['scanned_qr_text'];
            
                $query = mysqli_query($con, "SELECT * FROM qr_code WHERE qr_text = '$scanned_qr_text'");
                if (mysqli_num_rows($query) > 0) {
                    // A match is found, record the attendance
                    $user_id = $_SESSION['user_id'];
                    $user_fullname = $_SESSION['user_fullname'];
                    
                    // Insert the attendance record into the tracking table
                    $insert_query = mysqli_query($con, "INSERT INTO attendance (user_id, user_fullname, qr_text) VALUES ('$user_id', '$user_fullname', '$scanned_qr_text')");
                    if ($insert_query) {
                        echo "Attendance recorded successfully.";
                    } else {
                        echo "Error recording attendance: " . mysqli_error($con);
                    }
                } else {
                    // No match found for the scanned QR code
                    echo "Invalid QR code.";
                }
            }
            
            mysqli_close($con);
   
        ?>



    </body>

</html>