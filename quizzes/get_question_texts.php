<?php
function getQuestionText($quizNumber, $questionNumber) {
    $conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");
  
    // Check connection 
    if ($conn->connect_error) { 
      die("Connection failed: " . $conn->connect_error); 
    }
      
    $questionTextQuery = "SELECT question_text FROM questions WHERE quiz_number = $quizNumber AND question_number = $questionNumber"; 
    $questionTextResult = $conn->query($questionTextQuery); 
      
    while($row = $questionTextResult->fetch_assoc()) { 
      $questionText = $row["question_text"]; 
    }

    $conn->close();
    return $questionText;
}
?>