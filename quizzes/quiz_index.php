<?php
	include_once './../user_validation.php';

	function getQuizScore($quizNumber) {
		$conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");

		// Check connection 
		if ($conn->connect_error) { 
			die("Connection failed: " . $conn->connect_error); 
		}

		$quizScore = 0;
		$user = $_SESSION['valid_user'];
		$dbColumn = "quiz".$quizNumber."_score";
		$quizScoresQuery = "SELECT $dbColumn FROM users WHERE username = '$user'";
		$quizScoresResults = $conn->query($quizScoresQuery);
		
		if ($quizScoresResults->num_rows > 0) {
			while($row = $quizScoresResults->fetch_assoc()) {
				//If the score is still default (NULL) in the database.
				if ($row[$dbColumn] == NULL) {
					$quizScore = "Not completed";
					break;
				}
				$quizScore = $row[$dbColumn]." / 10 points";
			}
		} else {
			echo "Error: " . $quizScoresQuery . "<br>" . $conn->error;
		}

		return $quizScore;
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Quiz Index</title>
		<meta charset="utf-8"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="quiz_style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
			<h1>Choose a Quiz Below</h1>
		</header>
		<form style="display: inline" action="logout.php" method="get">
  			<button id="custom-button-logout" type="submit">Logout</button>
		</form>
		<nav>
		</nav>
		<section id="quizzes">
			<div class="quiz-div" id="quiz-1" onclick="location.href='quiz1.php'">
				<h3>Quiz 1</h3>
				<p>Math quiz.</p><br>
				<p><strong>Quiz Status:</strong></p>
				<p><?php echo getQuizScore(1) ?></p>
			</div>
			<div class="quiz-div" id="quiz-2" onclick="location.href='quiz2.php'">
				<h3>Quiz 2</h3>
				<p>Geography quiz.</p><br>
				<p><strong>Quiz Status:</strong></p>
				<p><?php echo getQuizScore(2) ?></p>
			</div>
			<div class="quiz-div" id="quiz-3" onclick="location.href='quiz3.php'">
				<h3>Quiz 3</h3>
				<p>Description</p><br>
				<p><strong>Quiz Status:</strong></p>
				<p><?php echo getQuizScore(3) ?></p>
			</div>
			<div class="quiz-div" id="quiz-4" onclick="location.href='quiz4.php'">
				<h3>Quiz 4</h3>
				<p>Description</p><br>
				<p><strong>Quiz Status:</strong></p>
				<p><?php echo getQuizScore(4) ?></p>		
			</div>
			<div class="quiz-div" id="quiz-5" onclick="location.href='quiz5.php'">
				<h3>Quiz 5</h3>
				<p>Description</p><br>
				<p><strong>Quiz Status:</strong></p>
				<p><?php echo getQuizScore(5) ?></p>
			</div>
		</section>
	</body>
</html>