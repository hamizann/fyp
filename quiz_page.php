<!DOCTYPE html>
<html>
<head>
    <title>Add Questions</title>
</head>
<body>
    <h1>Add Questions</h1>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the question sets from the form
        $questionSets = $_POST["question_set"];

        // Validate the question sets
        $validSets = true;
        foreach ($questionSets as $setIndex => $questionSet) {
            $questionText = $questionSet["question_text"];
            $answers = $questionSet["answer"];
            $correctAnswerIndex = $questionSet["correct_answer"];

            if (empty($questionText) || empty($answers[$correctAnswerIndex])) {
                $validSets = false;
                echo "Please enter all question sets with their answers.";
                break;
            }
        }

        if ($validSets) {
            // Insert the question sets into the database
            $conn = new mysqli("localhost", "username", "password", "database_name");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            foreach ($questionSets as $setIndex => $questionSet) {
                $questionText = $questionSet["question_text"];
                $answers = $questionSet["answer"];
                $correctAnswerIndex = $questionSet["correct_answer"];

                $sql = "INSERT INTO questions (question_text) VALUES ('$questionText')";

                if ($conn->query($sql) === TRUE) {
                    $questionId = $conn->insert_id;

                    foreach ($answers as $index => $answerText) {
                        $isCorrect = ($index == $correctAnswerIndex) ? 1 : 0;
                        $sql = "INSERT INTO answers (question_id, answer_text, is_correct) VALUES ('$questionId', '$answerText', '$isCorrect')";
                        $conn->query($sql);
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            echo "Question sets added successfully.";

            $conn->close();
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div id="question-sets">
            <?php for ($i = 0; $i < 10; $i++) { ?>
                <div class="question-set">
                    <h3>Question Set <?php echo ($i + 1); ?></h3>
                    <label for="question_text">Question:</label><br>
                    <textarea name="question_set[<?php echo $i; ?>][question_text]" rows="4" cols="50"></textarea><br>

                    <label for="answer">Answer Choices:</label><br>
                    <input type="text" name="question_set[<?php echo $i; ?>][answer][]" placeholder="Answer 1"><br>
                    <input type="text" name="question_set[<?php echo $i; ?>][answer][]" placeholder="Answer 2"><br>
                    <input type="text" name="question_set[<?php echo $i; ?>][answer][]" placeholder="Answer 3"><br>
                    <input type="text" name="question_set[<?php echo $i; ?>][answer][]" placeholder="Answer 4"><br>

                    <label for="correct_answer">Correct Answer:</label><br>
                    <select name="question_set[<?php echo $i; ?>][correct_answer]">
                        <option value="0">Answer 1</option>
                        <option value="1">Answer 2</option>
                        <option value="2">Answer 3</option>
                        <option value="3">Answer 4</option>
                    </select><br>
                </div>
            <?php } ?>
        </div>

        <input type="submit" value="Add Questions">
    </form>
</body>
</html>
