<?php
// Include the database connection file
include 'db_connect.php';

// Query to calculate the average of a column
$query = "SELECT AVG(score) AS average_score FROM user_scores";
$result = $con->query($query);

// Check for errors in the query execution
if (!$result) {
    echo "Query Error: " . $mysqli->error;
    exit();
}

// Fetch the average score from the result
$row = $result->fetch_assoc();
$averageScore = $row['average_score'];

// Format the average score to two decimal points
$formattedAverageScore = number_format($averageScore, 2);

// Close the database connection
$con->close();

echo "Average Score: " . $formattedAverageScore;
?>
