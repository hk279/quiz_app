<?php

$conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");

function getText($quizNumber, $questionNumber) {
    global $conn;

    $questionTextQuery = "SELECT question_text FROM questions WHERE quiz_number = '$quizNumber' AND question_number = '$questionNumber'";

    $queryReturn = $conn->query($questionTextQuery);

    $row = mysqli_fetch_row($queryReturn);
    $questionText = $row[0];

    return $questionText;
}