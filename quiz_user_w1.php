<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login_user.php');
    exit();
}

// Get the current user ID
$userId = $_SESSION['loggedin'];

include 'db_connect.php';

// Retrieve questions
$sql = "SELECT * FROM questions";
$result = mysqli_query($con, $sql);

// Initialize array to store incorrect answers and their correct options
$wrongAnswers = [];

if (mysqli_num_rows($result) > 0) {
    // Process the form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $score = 0;

        // Iterate through the submitted answers
        foreach ($_POST['answers'] as $questionId => $answerId) {
            // Fetch the correct answer for the question
            $sql = "SELECT is_correct FROM answers WHERE question_id = ? AND id = ?";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ii", $questionId, $answerId);
            mysqli_stmt_execute($stmt);
            $answerResult = mysqli_stmt_get_result($stmt);
            $correctAnswer = mysqli_fetch_assoc($answerResult);

            // Check if the submitted answer is correct
            if ($correctAnswer && $correctAnswer['is_correct']) {
                $score++;
            } else {
                // Fetch the correct answer options for the question
                $sql = "SELECT * FROM answers WHERE question_id = ? AND is_correct = 1";
                $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "i", $questionId);
                mysqli_stmt_execute($stmt);
                $correctAnswersResult = mysqli_stmt_get_result($stmt);
                $correctAnswers = mysqli_fetch_all($correctAnswersResult, MYSQLI_ASSOC);

                // Store the correct answer options for each wrong answer
                $wrongAnswers[$questionId] = [
                    'userAnswerId' => $answerId,
                    'correctAnswers' => $correctAnswers
                ];
            }
        }

        // Insert the score into the database
        $timestamp = date('Y-m-d H:i:s');
        $userId = $_SESSION['loggedin']; // Retrieve the user ID from the session variable

        $sql = "INSERT INTO user_scores (user_id, score, timestamp) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "iis", $userId, $score, $timestamp);
        if (mysqli_stmt_execute($stmt)) {
            echo "<p>Your score: $score</p>";
            echo "<p>Score saved successfully.</p>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap-icons.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="css/styles.css" rel="stylesheet" />
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

        .incorrect-answer {
            border: 2px solid red;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container px-lg-1">
        <a href="home_user.php" class="navbar-brand fs-3 fw-bold"><img src="img\favicon.ico">FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
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
                </ul>
            </li>
            <li class="nav-item fs-5"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <h1>Quiz</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $questionId = $row['id'];
            $questionText = $row['question_text'];

            // Fetch answer options for the question
            $sql = "SELECT * FROM answers WHERE question_id = ?";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "i", $questionId);
            mysqli_stmt_execute($stmt);
            $answerOptionsResult = mysqli_stmt_get_result($stmt);

            echo "<div class='question'><h3>$questionText</h3>";
            echo "<ul class='answer-options'>";

            while ($answerRow = mysqli_fetch_assoc($answerOptionsResult)) {
                $answerId = $answerRow['id'];
                $answerText = $answerRow['answer_text'];

                echo "<li><input type='radio' name='answers[$questionId]' value='$answerId' id='answer$answerId'><label for='answer$answerId'>$answerText</label></li>";
            }

            echo "</ul></div>";
        }
        ?>
        <input class="button button1" type="submit" value="Submit">
    </form>

    <?php
    // Display incorrect answers and their correct options
    if (!empty($wrongAnswers)) {
        echo "<h3>Incorrect Answers:</h3>";
    
        foreach ($wrongAnswers as $questionId => $wrongAnswer) {
            $userAnswerId = $wrongAnswer['userAnswerId'];
            $correctAnswers = $wrongAnswer['correctAnswers'];
    
            // Fetch the question text
            $sql = "SELECT question_text FROM questions WHERE id = ?";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "i", $questionId);
            mysqli_stmt_execute($stmt);
            $questionResult = mysqli_stmt_get_result($stmt);
            $questionRow = mysqli_fetch_assoc($questionResult);
            $questionText = $questionRow['question_text'];
    
            echo "<div class='incorrect-answer'>";
            echo "<p>Question: $questionText</p>";
            echo "<p>Your Answer: ";
    
            // Fetch the user's answer text
            $sql = "SELECT answer_text FROM answers WHERE question_id = ? AND id = ?";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ii", $questionId, $userAnswerId);
            mysqli_stmt_execute($stmt);
            $userAnswerResult = mysqli_stmt_get_result($stmt);
            $userAnswerRow = mysqli_fetch_assoc($userAnswerResult);
            $userAnswerText = $userAnswerRow['answer_text'];
    
            echo "$userAnswerText</p>";
            echo "<p>Correct Answer(s):</p>";
            echo "<ul>";
    
            foreach ($correctAnswers as $correctAnswer) {
                $answerId = $correctAnswer['id'];
                $answerText = $correctAnswer['answer_text'];
                echo "<li>Answer: $answerText</li>";
            }
    
            echo "</ul>";
            echo "</div>";
        }
    }
    ?>
</div>
<br><br><br>
<div>
    <!-- Footer-->
    <footer class="py-3">
        <div class="container"><p class="m-0 text-center text-white">&copy; Fundamental Online Guided Module to Perform Hajj and Umrah</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
