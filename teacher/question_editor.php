<?php
include_once '../get_data.php';
include_once '../user_validation.php';
verify_if_valid_admin();

$conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");
$quizNumber = $_POST["quiz_select"];

//Getting quiz details for the quiz in the correct index (quiz number minus 1).
$quizName = getQuizNames()[$quizNumber - 1];
$quizDescription = getQuizDescriptions()[$quizNumber - 1];
$quizInstructions = getQuizInstructions()[$quizNumber - 1];
//Declaring the questions array
$questions = getQuestionTexts($quizNumber);
//Declaring the answers array
$answers = getCorrectAnswers($quizNumber);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Question Editor</title>
		<meta charset="utf-8"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="dashboard_style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
			<h1>Question Editor</h1>
        </header>
        <button class="custom-button-return" onclick="location.href='teacher_dashboard.php'">Return</button>
		<form style="display: inline" action="logout.php" method="get">
  			<button id="custom-button-logout" type="submit">Logout</button>
        </form>
				<form id="edit" action="edit_database.php" method="POST">
					<fieldset>
						<legend>Quiz Details:</legend>
						Name: <input type="text" name="quiz-name" value="<?php echo $quizName ?>" style="width: 20%;">
						<p>Description</p><textarea name="quiz-description" rows="6" cols="40"><?php echo $quizDescription ?></textarea><br>
						<p>Instructions</p><textarea name="quiz-instructions" rows="6" cols="40"><?php echo $quizInstructions ?></textarea>
					</fieldset>

					<fieldset>
						<legend>Questions:</legend>
						<div class="q-and-a">
							Question 1: <input type="text" name="q-1" value="<?php echo $questions[0] ?>">
							Answer: <input type=text name="q-1-a" value="<?php echo $answers[0] ?>">
						</div>
						<div class="q-and-a">
							Question 2: <input type="text" name="q-2" value="<?php echo $questions[1] ?>">
							Answer: <input type=text name="q-2-a" value="<?php echo $answers[1] ?>">
						</div>
						<div class="q-and-a">
							Question 3: <input type="text" name="q-3" value="<?php echo $questions[2] ?>">
							Answer: <input type=text name="q-3-a" value="<?php echo $answers[2] ?>">
						</div>
						<div class="q-and-a">
							Question 4: <input type="text" name="q-4" value="<?php echo $questions[3] ?>">
							Answer: <input type=text name="q-4-a" value="<?php echo $answers[3] ?>">
						</div>
						<div class="q-and-a">
							Question 5: <input type="text" name="q-5" value="<?php echo $questions[4] ?>">
							Answer: <input type=text name="q-5-a" value="<?php echo $answers[4] ?>">
						</div>
						<div class="q-and-a">
							Question 6: <input type="text" name="q-6" value="<?php echo $questions[5] ?>">
							Answer: <input type=text name="q-6-a" value="<?php echo $answers[5] ?>">
						</div>
						<div class="q-and-a">
							Question 7: <input type="text" name="q-7" value="<?php echo $questions[6] ?>">
							Answer: <input type=text name="q-7-a" value="<?php echo $answers[6] ?>">
						</div>
						<div class="q-and-a">
							Question 8: <input type="text" name="q-8" value="<?php echo $questions[7] ?>">
							Answer: <input type=text name="q-8-a" value="<?php echo $answers[7] ?>">
						</div>
						<div class="q-and-a">
							Question 9: <input type="text" name="q-9" value="<?php echo $questions[8] ?>">
							Answer: <input type=text name="q-9-a" value="<?php echo $answers[8] ?>">
						</div>
						<div class="q-and-a">
							Question 10: <input type="text" name="q-10" value="<?php echo $questions[9] ?>">
							Answer: <input type=text name="q-10-a" value="<?php echo $answers[9] ?>">
						</div>
						<input type="hidden" name="quizNumber" value="<?php echo $quizNumber ?>">
					</fieldset>
					<button form="edit" type="submit" id="custom-button-save">Save</button>
				</form>
	</body>
</html>