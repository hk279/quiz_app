<?php
function getCorrectAnswers($quizNumber) {
    global $conn;
    $correctAnswers = array();
    $correctAnswersQuery = "SELECT question_answer FROM questions WHERE quiz_number = $quizNumber";
    $correctAnswersQueryResult = $conn->query($correctAnswersQuery);

    while ($row = $correctAnswersQueryResult->fetch_assoc()) {
        array_push($correctAnswers, $row["question_answer"]);
    }

    return $correctAnswers;
}
?>