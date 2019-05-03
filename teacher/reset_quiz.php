<?php
$quizNumber = $_POST["quiz_reset_button"];

$conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");
// Check connection 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$string = "quiz" . $quizNumber . "_score";
$resetQuery = "UPDATE users SET $string = NULL";
$conn->query($resetQuery);
if ($conn->query($resetQuery) === FALSE) {
    echo "Error: " . $resetQuery . "<br>" . $conn->error;
} else {
    header("Location: results_dashboard.php");
}

?>
