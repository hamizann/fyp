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

        .profile-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            flex-direction: column;
            padding-top: 1vh;
            box-sizing: border-box;
        }

        .profile-container h1 {
            margin-bottom: 20px;
        }

        .profile-container p {
            margin-bottom: 10px;
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
                </li>
                <li class="nav-item fs-5"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    
        <?php
        session_start();
        if (!isset($_SESSION['loggedin'])) {
            header('Location: login_user.php');
            exit();
        }

        // Get the current user ID
        $userId = $_SESSION['loggedin'];

        include 'db_connect.php';

        if ($userId) {
            // Retrieve user profile from the database
            $query = $con->prepare("SELECT * FROM user_account WHERE user_id = ?");

            if ($query) {
                $query->bind_param('i', $userId);
                $query->execute();
                $result = $query->get_result();

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();

                    echo "<h1 class='text-center'>User Profile</h1>";
                        echo "<div class='container d-flex justify-content-center'>";
                        echo "<div class='col-md-6'>";
                        echo "<form action='edit_profile_user.php' method='GET' id='editForm'>";
                        echo "<div class='form-group'>";
                        echo "  <strong><label for ='username'>Username:</label></strong><br>";
                        echo "  " . $user['user_username'] . "";
                        echo "</div><br>";    
                        echo "<div class='form-group'>";
                        echo "  <strong><label for ='fullname'>Fullname:</label></strong><br>";
                        echo "  " . $user['user_fullname'] . "";
                        echo "</div><br>";
                        echo "<div class='form-group'>";
                        echo "  <strong><label for ='email'>Email:</label></strong><br>";
                        echo "  " . $user['user_email'] . "";
                        echo "</div><br>";
                        echo "<div class='form-group'>";
                        echo "  <strong><label for ='phone'>Phone:</label></strong><br>";
                        echo "  " . $user['user_phoneNo'] . "";
                        echo "</div><br>";
                        echo "<div class='form-group'>";
                        echo "  <strong><label for ='dob'>DOB:</label></strong><br>";
                        echo "  " . $user['user_dateOfBirth'] . "";
                        echo "</div><br>";
                        echo "<div class='center'>";
                        echo "  <button type='submit' class='button' form='editForm'>Edit Details</button>";
                        echo "</div>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";

                } else {
                    echo "User not found";
                }
            } else {
                echo "Query error: " . $con->error;
            }
        } else {
            echo "No user ID provided";
        }
        ?>
    

    <div>
        <!-- Footer-->
        <footer class="py-3">
            <div class="container"><p class="m-0 text-center text-white">&copy; 2023 Fundamental Online Guided Module to Perform Hajj and Umrah</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </div>

    </body>
</html>
