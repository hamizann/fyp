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
        <a href="week3_admin.php" class="navbar-brand fs-3 fw-bold"><img src="img\favicon.ico"> FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item fs-5"><a class="nav-link" href="profile_page_admin.php">Profile</a></li>
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

<div>
    <h1>Add Question</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <div id="question_sets">
            <?php for ($i = 0; $i < 10; $i++) { ?>
                <div class="question_sets">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <p></p>
                                <hr class="mb-3">
                                <h3>Question Set <?php echo ($i + 1); ?></h3>
                                <label for="question_text"><b>Question</b></label>
                                <textarea name="question_set[<?php echo $i; ?>][question_text]" rows="4" cols="50" required></textarea><br>

                                <label for="answer"><b>Answer Choices</b></label>
                                <input class="form-control" type="text" name="question_set[<?php echo $i; ?>][answer][]" placeholder="Answer 1" required>
                                <input class="form-control" type="text" name="question_set[<?php echo $i; ?>][answer][]" placeholder="Answer 2" required>
                                <input class="form-control" type="text" name="question_set[<?php echo $i; ?>][answer][]" placeholder="Answer 3" required>
                                <input class="form-control" type="text" name="question_set[<?php echo $i; ?>][answer][]" placeholder="Answer 4" required><br>

                                <label for="correct_answer"><b>Correct Answer</b></label>
                                <select name="question_set[<?php echo $i; ?>][correct_answer]">
                                    <option value="0">Answer 1</option>
                                    <option value="1">Answer 2</option>
                                    <option value="2">Answer 3</option>
                                    <option value="3">Answer 4</option>
                                </select><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr class="mb-3">
        <input class="button" type="submit" value="Add Question"><br><br>
    </form>
</div>
</div>
<br><br>
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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //retrieve question from text area
    $questionSets = $_POST["question_set"];

    //validate the question text
    $validSets = true;
    foreach ($questionSets as $setIndex => $questionSet) {
        $questionText = $questionSet["question_text"];
        $answers = $questionSet["answer"];
        $correctAnswerIndex = $questionSet["correct_answer"];

        if (empty($questionText) || empty($answers[$correctAnswerIndex])) {
            $validSets = false;
            echo "Please enter all the question sets with their answers.";
            break;
        }
    }

    if ($validSets) {
        //Insert the question sets into the database
        include 'db_connect.php';

        foreach ($questionSets as $setIndex => $questionSet) {
            $questionText = $questionSet["question_text"];
            $answers = $questionSet["answer"];
            $correctAnswerIndex = $questionSet["correct_answer"];

            $sql = "INSERT INTO questions_w3 (question_text) VALUES ('$questionText')";

            if ($con->query($sql) === TRUE) {
                $questionId = $con->insert_id;

                foreach ($answers as $index => $answerText) {
                    $isCorrect = ($index == $correctAnswerIndex) ? 1 : 0;
                    $sql = "INSERT INTO answers_w3 (question_id, answer_text, is_correct) VALUES ('$questionId', '$answerText', '$isCorrect')";
                    $con->query($sql);
                }
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }

        echo "<script>
                $(document).ready(function() {
                    $('#successModal').modal('show')
                });
            </script>";

        $con->close();
    }
}
?>

<!-- Success message modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Question has been added successfully!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JS and your custom script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    <?php if($_SERVER["REQUEST_METHOD"] == "POST" && $validSets) { ?>
    $(document).ready(function() {
        $('#successModal').modal('show');
    });
    <?php } ?>
</script>


</body>
</html>
