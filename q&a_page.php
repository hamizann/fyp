<?php
// Establish a database connection (replace with your actual database credentials)
include 'db_connect.php';

session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login_user.php');
    exit();
}

// Get the current user ID
$userId = $_SESSION['loggedin'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve the user ID from the session
    // $userID = $_SESSION['user_id'];

    // Retrieve question from the form
    $question = $_POST['question'];

    $userId = $_SESSION['loggedin']; // Retrieve the user ID from the session variable

    // Save the question in the database
    $query = "INSERT INTO users_questions (user_id, question) VALUES ('$userId','$question')";

    if (mysqli_query($con, $query)) {
        echo 'Question saved successfully!';
    } else {
        echo 'Error: ' . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Bootstrap icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap-icons.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap) -->
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

        .button1 {
            width: 120px;
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
                            <li><a class="dropdown-item" href="view_q&a_answer.php">Answer</a></li>
                            <li><a class="dropdown-item" href="attendance_page.php">Attendance</a></li>
                        </ul>
                    </li>
                    <li class="nav-item fs-5"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>


    <h1>Ask a Question</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="question">Question:</label>
        <textarea name="question" rows="4" cols="50" required></textarea><br>

        <input type="submit" value="Submit">
    </form>

    <div>
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
