<?php

    include 'db_connect.php';

    session_start();
    if (!isset($_SESSION['loggedin1'])) {
        header('Location: login_admin.php');
        exit();
    }

    // Get the list of unanswered questions
    $query = "SELECT id, user_id, question FROM users_questions WHERE answer IS NULL";
    $result = mysqli_query($con, $query);

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $questionId = $_POST['question_id'];
        $answer = $_POST['answer'];

        // Update the question with the provided answer
        $updateQuery = "UPDATE users_questions SET answer = '$answer' WHERE id = $questionId";

        if (mysqli_query($con, $updateQuery)) {
            echo 'Answer saved successfully!';
        } else {
            echo 'Error: ' . mysqli_error($con);
        }
    }

    mysqli_close($con);

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
                <a href="home_admin.php" class="navbar-brand fs-3 fw-bold" ><img src="img\favicon.ico">FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item fs-5"><a class="nav-link" href="profile_user.php">Profile</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="x">Course</a></li>
                            <li><a class="dropdown-item" href="x">Question</a></li>
                            <li><a class="dropdown-item" href="x">Quiz</a></li>
                            <li><a class="dropdown-item" href="x">Answer</a></li>
                            <li><a class="dropdown-item" href="x">Attendance</a></li>
                        </ul>
                        <li class="nav-item fs-5"><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </nav>

        <h1>Admin - Answer Questions</h1>
        <table>
        <tr>
            <th>Question ID</th>
            <th>User ID</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['question']; ?></td>
                <td><?php echo $row['answer'] ?? ''; ?></td>
                <td>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="question_id" value="<?php echo $row['id']; ?>">
                        <textarea name="answer" rows="4" cols="30" required></textarea><br>
                        <input type="submit" value="Submit Answer">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>


        <br><br><br><br>
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