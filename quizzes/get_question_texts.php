<?php
$conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");

function getQuestionText($quizNumber, $questionNumber) {
    global $conn;
  
    // Check connection 
    if ($conn->connect_error) { 
      die("Connection failed: " . $conn->connect_error); 
    }
      
    $sql = "SELECT question_text FROM questions WHERE quiz_number = $quizNumber AND question_number = $questionNumber"; 
    $result = $conn->query($sql); 
      
    while($row = $result->fetch_assoc()) { 
      $q1Text = $row["question_text"]; 
    }

    return $q1Text;
}
?>