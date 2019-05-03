<?php
$conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");
session_start();
include_once '../get_data.php';

/* The function counts the number of total correct answers */
function checkAnswers($quizNumber) {

    $user = $_SESSION['valid_user'];
    global $conn;

    $correctAnswers = 0;
    $studentAnswers = array();
    /* Student answers are changed to all lower case for more fair comparison. */
    array_push(
        $studentAnswers,
        strtolower ( $_POST["q1-answer"] ),
        strtolower ( $_POST["q2-answer"] ),
        strtolower ( $_POST["q3-answer"] ),
        strtolower ( $_POST["q4-answer"] ),
        strtolower ( $_POST["q5-answer"] ),
        strtolower ( $_POST["q6-answer"] ),
        strtolower ( $_POST["q7-answer"] ),
        strtolower ( $_POST["q8-answer"] ),
        strtolower ( $_POST["q9-answer"] ),
        strtolower ( $_POST["q10-answer"] )
    );

    //Comparing the user answers to the correct answers fetched from the database. 
    for ($i = 1; $i <= 10; $i++) {
        $queryText = "SELECT question_answer FROM questions WHERE quiz_number = $quizNumber AND question_number = $i";
        $result = $conn->query($queryText);

        while ($row = $result->fetch_assoc()) {
            /* Right answers from the db are also changed to lower case for comparison. */
            $correctAnswer = strtolower($row["question_answer"]);
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

    return $correctAnswers;
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Quiz Results</title>
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="quiz_style.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <h2>Answers submitted</h2>
        </header>
        <div id="results">
            <h3>Your results:</h3>
            <p>
                Number of correct answers:<br>
                <?php
                    $quizNr = $_POST["quiz-number"];
                    $totalCorrect = checkAnswers($quizNr);
                    echo $totalCorrect; 
                ?> / 10
            </p>
                <?php
                    if ($totalCorrect >= getMinimumPassingGrade($quizNr)) {
                        echo "<p style='color: green;'>Congratulations! You have passed the quiz.</p>";
                    } else {
                        echo "<p style='color: red;'>Unfortunately you did not pass the quiz.</p>";
                    }
                ?>
        </div>
        <div>
        <!-- I added a correct answers table for possible future use. 
        It shouldn't be used when students can complete the quiz multiple times as is the case now. I left it visible just for reference -->
            <table id="correct-answers">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Correct Answer</th>
                    </tr>
                <thead>
                <tbody>
                    <?php
                        $questionTexts = getQuestionTexts($quizNr);
                        $correctAnswers = getCorrectAnswers($quizNr);
                        for ($i = 0; $i < 10; $i++) {
                            $question = $questionTexts[$i];
                            $correctAnswer = $correctAnswers[$i];
                            echo "<tr><td>$question</td><td>$correctAnswer</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <button class="custom-button" onclick="location.href='./quiz_index.php'" style="background: #F8F4E3">
            Return to the Quiz Menu
        </button>
    </body>

    </html>