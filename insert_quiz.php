<?php

    include 'db_connect.php';

    //retrieve from data
    $question = $_POST['question'];
    $optionsRaw = explode("\n", $_POST['options']);
    $options = array_map('trim', $optionsRaw);
    $correctAnswer = $_POST['correct_answer'];

    //sanitize and escape form data
    $question = mysqli_real_escape_string($con, $question);
    $options = array_map('mysqli_real_escape_string', $con, $options);
    $correctAnswer = mysqli_real_escape_string($con, $correctAnswer);

    //serialize the options array
    $optionsSerialized = serialize($options);

    //insert question into the database 
    $query = "INSERT INTO questions (question, options, correct_answer) VALUES ('$question', '$optionsSerialized', '$correctAnswer')";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Error inserting question: " . mysqli_error($con));
    }

    //close the db connection
    mysqli_close($con);

    //redirect back to the quiz page
    header('Location: quiz_page.php');
    exit();

?>