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

<header class="bg-dark py-5 mb-5">
    <div class="container px-lg-1">
        <div class="p-4 p-lg-5 bg-light rounded-3">
            <div class="m-4 m-lg-5">
                <h1 class="display-4 fw-bold">FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</h1>
                <p class="fs-4">Question Page</p>
            </div>
        </div>
    </div>
</header>

<div class="container px-lg-1">
    <div class="p-4 p-lg-5 bg-light rounded-3">
        <div class="m-4 m-lg-5">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="mb-3">
                    <label for="question_count" class="form-label">Number of Questions:</label>
                    <input type="number" class="form-control" id="question_count" name="question_count" min="1" max="10" required>
                </div>
                <button type="submit" class="button">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["question_count"])) {
    $questionCount = $_POST["question_count"];
?>

<div class="container px-lg-1">
    <div class="p-4 p-lg-5 bg-light rounded-3">
        <div class="m-4 m-lg-5">
            <form method="POST" action="save_question_w2.php">
                <?php
                for ($i = 1; $i <= $questionCount; $i++) {
                ?>
                    <div class="mb-3">
                        <label for="question_text<?php echo $i; ?>" class="form-label">Question <?php echo $i; ?>:</label>
                        <input type="text" class="form-control" id="question_text<?php echo $i; ?>" name="question_set[<?php echo $i; ?>][question_text]" required>
                    </div>
                    <div class="mb-3">
                        <label for="answer<?php echo $i; ?>_1" class="form-label">Answer 1:</label>
                        <input type="text" class="form-control" id="answer<?php echo $i; ?>_1" name="question_set[<?php echo $i; ?>][answer][0]" required>
                    </div>
                    <div class="mb-3">
                        <label for="answer<?php echo $i; ?>_2" class="form-label">Answer 2:</label>
                        <input type="text" class="form-control" id="answer<?php echo $i; ?>_2" name="question_set[<?php echo $i; ?>][answer][1]" required>
                    </div>
                    <div class="mb-3">
                        <label for="answer<?php echo $i; ?>_3" class="form-label">Answer 3:</label>
                        <input type="text" class="form-control" id="answer<?php echo $i; ?>_3" name="question_set[<?php echo $i; ?>][answer][2]" required>
                    </div>
                    <div class="mb-3">
                        <label for="answer<?php echo $i; ?>_4" class="form-label">Answer 4:</label>
                        <input type="text" class="form-control" id="answer<?php echo $i; ?>_4" name="question_set[<?php echo $i; ?>][answer][3]" required>
                    </div>
                    <div class="mb-3">
                        <label for="correct_answer<?php echo $i; ?>" class="form-label">Correct Answer:</label>
                        <select class="form-select" id="correct_answer<?php echo $i; ?>" name="question_set[<?php echo $i; ?>][correct_answer]" required>
                            <option value="0">Answer 1</option>
                            <option value="1">Answer 2</option>
                            <option value="2">Answer 3</option>
                            <option value="3">Answer 4</option>
                        </select>
                    </div>
                <?php
                }
                ?>
                <button type="submit" class="button">Add Questions</button>
            </form>
        </div>
    </div>
</div>

<?php
}
?>

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

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
