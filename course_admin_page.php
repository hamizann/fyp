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

    <?php   
        include 'db_connect.php';

        //$sql_all = mysqli_query($con,"SELECT * FROM slide WHERE slide_id='3'") or die(mysqli_error($con));
        //$sql_all = "SELECT * FROM slide AND slide_id = '1'";
        //$result_all = mysqli_fetch_array($sql_all); 
        //$fetch_all = mysqli_fetch_all(MYSQLI_ASSOC);
        
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container px-lg-1">
                <a href="home_admin.php" class="navbar-brand fs-3 fw-bold" ><img src="img\favicon.ico"> FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item fs-5"><a class="nav-link" href="profile_user.php">Profile</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Course</a></li>
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
            <h1 class="display-4">Introduction  </h1>
            <p class="lead">This is the course page where you can access and manage on each week study materials.</p>
            <hr class="hr"/>
    
            <h1 class="display-4">Weeks 1 </h1>
            <p class="lead">Manage study materials for Week 1 of the courses</p>
            <p><a href="week1_admin.php" class="button">Week 1</a></p>
            <hr class="hr"/>

            <h1 class="display-4">Weeks 2 </h1>
            <p class="lead">Manage study materials for Week 2 of the courses</p>
            <p><a href="week2_admin.php" class="button">Week 2</a></p>
            <hr class="hr"/>

            <h1 class="display-4">Weeks 3 </h1>
            <p class="lead">Manage study materials for Week 3 of the courses</p>
            <p><a href="week3_admin.php" class="button">Week 3</a></p>
            <hr class="hr"/>

            <h1 class="display-4">Weeks 4 </h1>
            <p class="lead">Manage study materials for Week 4 of the courses</p>
            <p><a href="week4_admin.php" class="button">Week 4</a></p>
            <hr class="hr"/>

            <h1 class="display-4">Weeks 5 </h1>
            <p class="lead">Manage study materials for Week 5 of the courses</p>
            <p><a href="week5_admin.php" class="button">Week 5</a></p>
            <hr class="hr"/>

            <h1 class="display-4">Weeks 6 </h1>
            <p class="lead">Manage study materials for Week 6 of the courses</p>
            <p><a href="week6_admin.php" class="button">Week 6</a></p>
            <hr class="hr"/>

            <h1 class="display-4">Weeks 7 </h1>
            <p class="lead">Manage study materials for Week 7 of the courses</p>
            <p><a href="week7_admin.php" class="button">Week 7</a></p>
            <hr class="hr"/>

            <h1 class="display-4">Weeks 8 </h1>
            <p class="lead">Manage study materials for Week 8 of the courses</p>
            <p><a href="week8_admin.php" class="button">Week 8</a></p>
            <hr class="hr"/>

            <h1 class="display-4">Weeks 9 </h1>
            <p class="lead">Manage study materials for Week 9 of the courses</p>
            <p><a href="week9_admin.php" class="button">Week 9</a></p>
            <hr class="hr"/>

            <h1 class="display-4">Weeks 10 </h1>
            <p class="lead">Manage study materials for Week 10 of the courses</p>
            <p><a href="week10_admin.php" class="button">Week 10</a></p>
            <hr class="hr"/>

        </div>
    </div>
    <br><br>
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