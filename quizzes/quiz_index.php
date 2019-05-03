<?php
	$conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");
	// Check connection 
	if ($conn->connect_error) { 
		die("Connection failed: " . $conn->connect_error); 
	}

	include_once './../user_validation.php';
	include_once './../get_data.php';

	$quizNames = getQuizNames();
	$quizDescriptions = getQuizDescriptions();

	function getQuizScore($quizNumber) {
		global $conn;

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
			<h1>Choose a Quiz</h1>
		</header>
		<form style="display: inline" action="logout.php" method="get">
  			<button id="custom-button-logout" type="submit">Logout</button>
		</form>
		<section id="quizzes">
			<div class="quiz-div" id="quiz-1" onclick="location.href='quiz1.php'">
				<h3><?php echo $quizNames[0] ?></h3>
				<p><?php echo $quizDescriptions[0] ?></p><br>
				<p><strong>Quiz Status:</strong></p>
				<p><?php echo getQuizScore(1) ?></p>
			</div>
			<div class="quiz-div" id="quiz-2" onclick="location.href='quiz2.php'">
				<h3><?php echo $quizNames[1] ?></h3>
				<p><?php echo $quizDescriptions[1] ?></p><br>
				<p><strong>Quiz Status:</strong></p>
				<p><?php echo getQuizScore(2) ?></p>
			</div>
			<div class="quiz-div" id="quiz-3" onclick="location.href='quiz3.php'">
				<h3><?php echo $quizNames[2] ?></h3>
				<p><?php echo $quizDescriptions[2] ?></p><br>
				<p><strong>Quiz Status:</strong></p>
				<p><?php echo getQuizScore(3) ?></p>
			</div>
			<div class="quiz-div" id="quiz-4" onclick="location.href='quiz4.php'">
				<h3><?php echo $quizNames[3] ?></h3>
				<p><?php echo $quizDescriptions[3] ?></p><br>
				<p><strong>Quiz Status:</strong></p>
				<p><?php echo getQuizScore(4) ?></p>		
			</div>
			<div class="quiz-div" id="quiz-5" onclick="location.href='quiz5.php'">
				<h3><?php echo $quizNames[4] ?></h3>
				<p><?php echo $quizDescriptions[4] ?></p><br>
				<p><strong>Quiz Status:</strong></p>
				<p><?php echo getQuizScore(5) ?></p>
			</div>
		</section>
	</body>
</html>