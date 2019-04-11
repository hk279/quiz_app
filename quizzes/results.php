<?php
$conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");
session_start();

function checkAnswers($quizNumber) {
    $user = $_SESSION['valid_user'];
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

    //Comparing the user answers to the correct answers fetched from the database. 
    for ($i = 1; $i <= 10; $i++) {
        $queryText = "SELECT question_answer FROM questions WHERE quiz_number = $quizNumber AND question_number = $i";
        $result = $conn->query($queryText);

        while ($row = $result->fetch_assoc()) {
            $correctAnswer = $row["question_answer"];
            if ($studentAnswers[$i - 1] == $correctAnswer) {
                $correctAnswers++;
            }
        }
    }
    
    //Updating the result into database.
    $dbColumn = "quiz".$quizNumber."_score";
    $updateResultQuery = "UPDATE users SET $dbColumn = $correctAnswers WHERE username = '$user'";
    $conn->query($updateResultQuery);

    if ($conn->query($updateResultQuery) === FALSE) {
        echo "Error: " . $updateResultQuery . "<br>" . $conn->error;
    }

    $conn->close();
    return $correctAnswers;
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Quiz Results</title>
        <meta charset="utf-8" />
        <link href="quiz_style.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <h2>Answers submitted</h2>
            <h3>Your results:</h3>
        </header>
        <div id="results">
            <p>
                Number of correct answers:<br>
                <?php
                    $quizNr = $_POST["quiz-number"];
                    echo checkAnswers($quizNr); 
                ?> / 10
            </p>
        </div>
        <strong><a href="./quiz_index.php">Return to the quiz menu</a></strong>
    </body>

    </html>