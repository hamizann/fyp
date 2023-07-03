<?php
    session_start();
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login_user.php');
        exit();
    }

    // Get the user ID from the session
    $userId = $_SESSION['loggedin'];
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
            <a href="home_user.php" class="navbar-brand fs-3 fw-bold"><img src="img\favicon.ico">FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item fs-5"><a class="nav-link" href="profile_page_user.php">Profile</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="course_page.php">Course</a></li>
                        <li><a class="dropdown-item" href="question_page.php">Question</a></li>
                        <li><a class="dropdown-item" href="quiz_user_w1.php">Quiz</a></li>
                        <li><a class="dropdown-item" href="view_q&a_answer.php">Answer</a></li>
                        <li><a class="dropdown-item" href="attendance_page.php">Attendance</a></li>
                    </ul>
                </li>
                <li class="nav-item fs-5"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

        <div class="content">
			<h3>Welcome, <?=$_SESSION['name']?>!</h3>
            <!-- <p style="font-family:verdana">Get started to learn about Hajj and Umrah to become prepare when it's your turn</p> -->
            <h3>Get started to learn about Hajj and Umrah to become prepare when it's your turn</h3>
            <div class="text-center">
            <img src="/PSM1 Project/img/5452153.jpg" alt="hajj icon" height="1000" width="800" class="img-fluid"/>
            </div>
            <div class="col-md-12 text-center">
            <a href="course_page.php" class="button" >Get Started</a>
            </div>
		</div>
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
