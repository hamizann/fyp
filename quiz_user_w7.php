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
$sql = "SELECT * FROM questions_w7";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0;

    // Iterate through the submitted answers
    foreach ($_POST['answers'] as $questionId => $answerId) {
        // Fetch the correct answer for the question
        $sql = "SELECT is_correct FROM answers_w7 WHERE question_id = ? AND id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $questionId, $answerId);
        mysqli_stmt_execute($stmt);
        $answerResult = mysqli_stmt_get_result($stmt);
        $correctAnswer = mysqli_fetch_assoc($answerResult);

        // Check if the submitted answer is correct
        if ($correctAnswer && $correctAnswer['is_correct']) {
            $score++;
        }
    }

    // Insert the score into the database
    $timestamp = date('Y-m-d H:i:s');
    $userId = $_SESSION['loggedin']; // Retrieve the user ID from the session variable

    $sql = "INSERT INTO user_scores_w7 (user_id, score, timestamp) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "iis", $userId, $score, $timestamp);
    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Your score: $score</p>";
        echo "<p>Score saved successfully.</p>";
    } else {
        echo "Error: " . mysqli_error($con);
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

    <div class="container">
        <h1>Quiz</h1>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $questionId = $row['id'];
                $questionText = $row['question_text'];

                // Fetch answer options for the question
                $sql = "SELECT * FROM answers_w7 WHERE question_id = ?";
                $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "i", $questionId);
                mysqli_stmt_execute($stmt);
                $answerResult = mysqli_stmt_get_result($stmt);
                $answers = mysqli_fetch_all($answerResult, MYSQLI_ASSOC);
                ?>

                <div class="mb-4">
                    <h4><?php echo $questionText; ?></h4>
                    <?php foreach ($answers as $answer) { ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[<?php echo $questionId; ?>]" value="<?php echo $answer['id']; ?>" required>
                            <label class="form-check-label"><?php echo $answer['answer_text']; ?></label>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <button type="submit" class="button">Submit</button>
        </form>
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
} else {
    echo "No questions found.";
}

// Close the database connection
mysqli_close($con);
?>
