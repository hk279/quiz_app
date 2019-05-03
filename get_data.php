<?php
$conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");
// Check connection 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
}

function getQuestionTexts($quizNumber) {
    global $conn;
    $questionTexts = array();
      
    $query = "SELECT * FROM questions WHERE quiz_number = $quizNumber"; 
    $result = $conn->query($query); 
      
    while($row = $result->fetch_assoc()) { 
      array_push($questionTexts, $row["question_text"]); 
    }
  
    return $questionTexts;
}

function getCorrectAnswers($quizNumber) {
    global $conn;
    $correctAnswers = array();
    $query = "SELECT * FROM questions WHERE quiz_number = $quizNumber";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        array_push($correctAnswers, $row["question_answer"]);
    }

    return $correctAnswers;
}

function getQuizDescriptions() {
    global $conn;
    $descriptions = array();
    $query = "SELECT * FROM quizzes";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        array_push($descriptions, $row["quiz_description"]);
    }

    return $descriptions;
}

function getQuizNames() {
    global $conn;
    $quizNames = array();
    $query = "SELECT * FROM quizzes";
    $result = $conn->query($query) or die(mysql_error());

    while ($row = $result->fetch_assoc()) {
        array_push($quizNames, $row["quiz_name"]);
    }

    return $quizNames;
}

function getQuizInstructions() {
    global $conn;
    $instructions = array();
    $query = "SELECT * FROM quizzes";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        array_push($instructions, $row["quiz_instructions"]);
    }

    return $instructions;
}

function getMinimumPassingGrade($quizNumber) {
    global $conn;
    $queryText = "SELECT passing_grade FROM quizzes WHERE quiz_id = $quizNumber";
    $result = $conn->query($queryText);
    while ($row = $result->fetch_assoc()) {
        $minimumPassingGrade = $row["passing_grade"];
    }
    return $minimumPassingGrade;
}
?>