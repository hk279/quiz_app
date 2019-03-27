<!DOCTYPE html>
<html lang="en">

<head>
    <title>
    </title>
    <meta charset="utf-8" />
    <link href="quiz_style.css" rel="stylesheet">
</head>

<body>
    <header>
        <h2>Quiz header</h2>
        <p>Quiz Instructions</p><br>
        <a href="quiz_index.html">Return to Quiz Selection</a>
    </header>
    <div id="questions-div">
        <form id="quiz" action="check_answers.php" method="POST">
            <fieldset class="question-fieldset" id="question1">
                <p>Question text</p><br>
                <input type=text name="q1-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question2">
                <p>Question text</p><br>
                <input type=text name="q2-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question3">
                <p>Question text</p><br>
                <input type=text name="q3-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question4">
                <p>Question text</p><br>
                <input type=text name="q4-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question5">
                <p>Question text</p><br>
                <input type=text name="q5-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question6">
                <p>Question text</p><br>
                <input type=text name="q6-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question7">
                <p>Question text</p><br>
                <input type=text name="q7-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question8">
                <p>Question text</p><br>
                <input type=text name="q8-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question9">
                <p>Question text</p><br>
                <input type=text name="q9-answer">
            </fieldset>
            <fieldset class="question-fieldset" id="question10">
                <p>Question text</p><br>
                <input type=text name="q10-answer">
            </fieldset>
            <br><input type="submit" name="submit-answers" value="Submit Answers"><br>
        </form>
    </div>
</body>

</html> 