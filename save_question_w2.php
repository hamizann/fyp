<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["question_set"])) {
    $questionSets = $_POST["question_set"];
    $validSets = false;

    // Validate question sets
    foreach ($questionSets as $setIndex => $questionSet) {
        if (!empty($questionSet["question_text"]) && !empty($questionSet["answer"]) && isset($questionSet["correct_answer"])) {
            $validSets = true;
            break;
        }
    }

    if ($validSets) {
        // Insert the question sets into the database
        foreach ($questionSets as $setIndex => $questionSet) {
            $questionText = $questionSet["question_text"];
            $answers = $questionSet["answer"];
            $correctAnswerIndex = $questionSet["correct_answer"];

            $sql = "INSERT INTO questions_w2 (question_text) VALUES ('$questionText')";

            if ($con->query($sql) === TRUE) {
                $questionId = $con->insert_id;

                foreach ($answers as $index => $answerText) {
                    $isCorrect = ($index == $correctAnswerIndex) ? 1 : 0;
                    $sql = "INSERT INTO answers_w2 (question_id, answer_text, is_correct) VALUES ('$questionId', '$answerText', '$isCorrect')";
                    if ($con->query($sql) !== TRUE) {
                        echo "Error inserting answer: " . $sql . "<br>" . $con->error;
                    }
                }
            } else {
                echo "Error inserting question: " . $sql . "<br>" . $con->error;
            }
        }

        // Redirect to a success page
        header("Location: success_w2.php");
        exit();
    } else {
        // Redirect to an error page
        header("Location: error_w2.php");
        exit();
    }
} else {
    echo "Invalid request!";
}
?>
