<?php
	include_once './../user_validation.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Quiz Index</title>
		<meta charset="utf-8"/>
		<link href="quiz_style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
			<h1>Choose a Quiz Below</h1>
		</header>
		<a href="logout.php"><button id="logout-button">Logout</button></a>
		<nav>
		</nav>
		<section id="quizzes">
			<div class="quiz-div" id="quiz-1" onclick="location.href='quiz1.php'">
				<h3>Quiz 1</h3>
				<p>Description</p><br>
				<p id="quiz1-status">Quiz status</p>
			</div>
			<div class="quiz-div" id="quiz-2" onclick="location.href='quiz2.php'">
				<h3>Quiz 2</h3>
				<p>Description</p><br>
				<p id="quiz2-status">Quiz status</p>
			</div>
			<div class="quiz-div" id="quiz-3" onclick="location.href='quiz3.php'">
				<h3>Quiz 3</h3>
				<p>Description</p><br>
				<p id="quiz3-status">Quiz status</p>
			</div>
			<div class="quiz-div" id="quiz-4" onclick="location.href='quiz4.php'">
				<h3>Quiz 4</h3>
				<p>Description</p><br>
				<p id="quiz4-status">Quiz status</p>		
			</div>
			<div class="quiz-div" id="quiz-5" onclick="location.href='quiz5.php'">
				<h3>Quiz 5</h3>
				<p>Description</p><br>
				<p id="quiz5-status">Quiz status</p>
			</div>
		</section>
	</body>
</html>