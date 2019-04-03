<?php
$conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");

function checkAnswers($quizNumber) {
    global $conn;

    $correctAnswers = 0;
    $studentAnswers = array();
    array_push(
        $studentAnswers, 
        $_POST["q1-answer"], 
        $_POST["q2-answer"], 
        $_POST["q3-answer"],
        $_POST["q4-answer"],
        $_POST["q5-answer"],
        $_POST["q6-answer"],
        $_POST["q7-answer"],
        $_POST["q8-answer"],
        $_POST["q9-answer"],
        $_POST["q10-answer"]
    );

    for ($i = 1; $i <= 10; $i++) { 
        $queryText = "SELECT question_answer FROM questions WHERE quiz_number = $quizNumber AND question_number = $i";
        $correctAnswerRow = $conn->query($queryText);
        $correctAnswer = mysqli_result($correctAnswerRow, 0);
        if ($studentAnswers[$i-1] == $correctAnswer) {
            $correctAnswers++;
        }
    }

    return $correctAnswers;
}
