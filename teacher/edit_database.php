<?php
    $conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");

    $q1text = $_POST["q-1"];
    $q2text = $_POST["q-2"];
    $q3text = $_POST["q-3"];
    $q4text = $_POST["q-4"];
    $q5text = $_POST["q-5"];
    $q6text = $_POST["q-6"];
    $q7text = $_POST["q-7"];
    $q8text = $_POST["q-8"];
    $q9text = $_POST["q-9"];
    $q10text = $_POST["q-10"];

    $questionTexts = array();
    array_push($questionTexts, $q1text, $q2text, $q3text, $q4text, $q5text, $q6text, $q7text, $q8text, $q9text, $q10text);

    $q1answer = $_POST["q-1-a"];
    $q2answer = $_POST["q-2-a"];
    $q3answer = $_POST["q-3-a"];
    $q4answer = $_POST["q-4-a"];
    $q5answer = $_POST["q-5-a"];
    $q6answer = $_POST["q-6-a"];
    $q7answer = $_POST["q-7-a"];
    $q8answer = $_POST["q-8-a"];
    $q9answer = $_POST["q-9-a"];
    $q10answer = $_POST["q-10-a"];

    $questionAnswers = array();
    array_push($questionAnswers, $q1answer, $q2answer, $q3answer, $q4answer, $q5answer, $q6answer, $q7answer, $q8answer, $q9answer, $q10answer);

    $quizNumber = $_POST["quizNumber"];

    for ($i = 0; $i < 10; $i++) {
        if ($questionTexts[$i] = null) {
            continue;
        }
        $questionNumber = $i + 1;
        $updateQuestionQuery = "UPDATE questions SET question_text = $questionTexts[$i] WHERE quiz_number = $quizNumber AND question_number = $questionNumber";
        $conn->query($updateQuestionQuery);

        if ($conn->query($updateQuestionQuery) === FALSE) {
            echo "Error: " . $updateQuestionQuery . "<br>" . $conn->error;
        }
    }
    
    for ($i = 0; $i < 10; $i++) {
        if ($questionAnswers[$i] = null) {
            continue;
        }
        $questionNumber = $i + 1;
        $updateAnswerQuery = "UPDATE questions SET question_answer = $questionAnswers[$i] WHERE quiz_number = $quizNumber AND question_number = $questionNumber";
        $conn->query($updateAnswerQuery);

        if ($conn->query($updateAnswerQuery) === FALSE) {
            echo "Error: " . $updateAnswerQuery . "<br>" . $conn->error;
        }
    }
    
?>