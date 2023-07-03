<?php
session_start();
if (!isset($_SESSION['loggedin1'])) {
    header('Location: login_admin.php');
    exit();
}

include 'db_connect.php';

// Retrieve quiz results with associated usernames
$sql = "SELECT user_scores.score, user_scores.user_id, user_scores.timestamp, user_account.user_username FROM user_scores INNER JOIN user_account ON user_scores.user_id = user_account.user_id";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</title>
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
                <a href="quiz_admin_page.php" class="navbar-brand fs-3 fw-bold"><img src="img\favicon.ico"> FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item fs-5"><a class="nav-link" href="profile_user.php">Profile</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="course_admin_page.php">Course</a></li>
                                <li><a class="dropdown-item" href="quiz_admin_page.php">Quiz</a></li>
                                <li><a class="dropdown-item" href="answer_admin_page.php">Answer</a></li>
                                <li><a class="dropdown-item" href="attendance_admin.php">Attendance</a></li>
                                <li><a class="dropdown-item" href="quiz_results_admin.php">Report</a></li>
                                <li><a class="dropdown-item" href="bar_chart.php">Analysis</a></li>
                        </ul>
                    </li>
                    <li class="nav-item fs-5"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>

    <div class="container mt-5">
        <h1>Quiz Results</h1>
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Score</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['user_username']; ?></td>
                            <td><?php echo $row['score']; ?></td>
                            <td><?php echo $row['timestamp']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No quiz results found.</p>
        <?php } ?>
        <a href="home_admin.php" class="button">Go Back</a>
    </div>

    <br><br><br>

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

<?php
// Close the database connection
mysqli_close($con);
?>
