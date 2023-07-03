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
        <a href="week1_admin.php" class="navbar-brand fs-3 fw-bold"><img src="img\favicon.ico"> FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
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
            </li>
            <li class="nav-item fs-5"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>
    <h1>Delete Question Set</h1>
    <?php
    include 'db_connect.php';

    if (isset($_GET['id'])) {
        $questionId = $_GET['id'];

        // Retrieve the question details based on the provided question ID
        $questionQuery = "SELECT * FROM questions WHERE id = $questionId";
        $questionResult = mysqli_query($con, $questionQuery);

        if (!$questionResult) {
            echo "Error retrieving question: " . mysqli_error($con);
            exit;
        }

        $questionRow = mysqli_fetch_assoc($questionResult);
        $questionText = $questionRow['question_text'];

        // Retrieve the answers for the question
        $answersQuery = "SELECT * FROM answers WHERE question_id = $questionId";
        $answersResult = mysqli_query($con, $answersQuery);

        if (!$answersResult) {
            echo "Error retrieving answers: " . mysqli_error($con);
            exit;
        }

        $answers = array();
        while ($answerRow = mysqli_fetch_assoc($answersResult)) {
            $answers[] = $answerRow['answer_text'];
        }
    }
    ?>

    <h3>Question:</h3>
    <p><?php echo $questionText; ?></p>

    <h3>Answers:</h3>
    <ul>
        <?php foreach ($answers as $index => $answer) { ?>
            <li><?php echo $answer; ?></li>
        <?php } ?>
    </ul>

    <form method="POST" action="">
        <input type="hidden" name="question_id" value="<?php echo $questionId; ?>" />
        <input type="submit" name="delete" value="Delete Question Set" />
        <br><br>
    </form>

    <?php
    if (isset($_POST['delete'])) {
        // Delete the answers associated with the question
        $deleteAnswersQuery = "DELETE FROM answers WHERE question_id = $questionId";
        $deleteAnswersResult = mysqli_query($con, $deleteAnswersQuery);

        if (!$deleteAnswersResult) {
            echo "Error deleting answers: " . mysqli_error($con);
            exit;
        }

        // Delete the question
        $deleteQuestionQuery = "DELETE FROM questions WHERE id = $questionId";
        $deleteQuestionResult = mysqli_query($con, $deleteQuestionQuery);

        if (!$deleteQuestionResult) {
            echo "Error deleting question: " . mysqli_error($con);
            exit;
        }   

        echo "Question set deleted successfully!";
        //redirect to the edit_w1_quiz.php page after a short delay
        echo '<meta http-equiv="refresh" content="2;url=edit_w1_quiz.php">';
        exit;
    }
    ?>

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
