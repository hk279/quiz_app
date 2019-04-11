<?php
//Questions are retrieved from the database by using a function found in this file.
include_once './get_question_texts.php';
//Checking if the user is logged in.
include_once './../user_validation.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>
    </title>
    <meta charset="utf-8" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="quiz_style.css" rel="stylesheet">
</head>

<body>
    <header>
        <h2>Geography Quiz</h2>
        <p>
            The minimum passing grade for this quiz is 5 points. 
            Every correct answer is worth one point and there are no penalties for wrong answers.
        </p>
        <p>Case of the letters in the answer is not relevant.</p>
        <button id="custom-button-return" onclick="location.href='quiz_index.php'">Return to Quiz Selection</button>
    </header>
    <div id="questions-div">
        <form id="quiz" action="results.php" method="POST">
            <fieldset class="question-fieldset" id="question1">
                <p><?php echo getQuestionText(2,1) ?></p><br>
                <input type=text name="q1-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question2">
                <p><?php echo getQuestionText(2,2) ?></p><br>
                <input type=text name="q2-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question3">
                <p><?php echo getQuestionText(2,3) ?></p><br>
                <input type=text name="q3-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question4">
                <p><?php echo getQuestionText(2,4) ?></p><br>
                <input type=text name="q4-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question5">
                <p><?php echo getQuestionText(2,5) ?></p><br>
                <input type=text name="q5-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question6">
                <p><?php echo getQuestionText(2,6) ?></p><br>
                <input type=text name="q6-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question7">
                <p><?php echo getQuestionText(2,7) ?></p><br>
                <input type=text name="q7-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question8">
                <p><?php echo getQuestionText(2,8) ?></p><br>
                <input type=text name="q8-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question9">
                <p><?php echo getQuestionText(2,9) ?></p><br>
                <input type=text name="q9-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question10">
                <p><?php echo getQuestionText(2,10) ?></p><br>
                <input type=text name="q10-answer">
            </fieldset>
            <!-- A hidden quiz number field to send to the results page in order to know which quiz is being checked. -->
            <input type=text id="quiz-number" name="quiz-number" value="2" style="display: none;">
            <br><input type="submit" name="submit-answers" value="Submit Answers"><br>
        </form>
    </div>
</body>

</html> 