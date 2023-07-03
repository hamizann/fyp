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

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container label {
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container .button {
            width: 100%;
            padding: 10px;
            background-color: #25a2aa;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .form-container .button:hover {
            background-color: #1a8087;
        }

        .success-message {
            text-align: center;
            color: green;
            margin-top: 10px;
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

        <div class="form-container">
            <h2>Attendance Form</h2>
            <form method="post" action="">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone No:</label>
                <input type="text" id="phone" name="phone" required>

                <button class="button" name="submit">Submit</button>
            </form>

            <?php
            include 'db_connect.php';

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $date = date('Y-m-d');

                $query = "INSERT INTO attendance_records (name, username, email, phoneNo, date) VALUES ('$name', '$username', '$email', '$phone', '$date')";

                if (mysqli_query($con, $query)) {
                    echo "<p class='success-message'>Attendance recorded successfully!</p>";
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($con);
                }
            }
            ?>
        </div>

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
