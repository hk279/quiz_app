<?php
include_once '../user_validation.php';
verify_if_valid_admin();

$student = $_POST["students"];
$quiz = $_POST["quizzes"];

$conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");

/* Getting student usernames from the db. */
$studentUsernames = array();
$studentUsernamesQuery = "SELECT username FROM users";

$studentUsernamesQueryResult = $conn->query($studentUsernamesQuery);
while ($row = $studentUsernamesQueryResult->fetch_assoc()) {
    array_push($studentUsernames, $row["username"]);
}


/* Getting quiz names from the db. */
$quizNames = array();
$quizNamesQuery = "SELECT quiz_name FROM quizzes";

$quizNamesQueryResult = $conn->query($quizNamesQuery);
while ($row = $quizNamesQueryResult->fetch_assoc()) {
    array_push($quizNames, $row["quiz_name"]);
}
?>

<!-- Possibility to add a search/filter function to the result view later  -->

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Results Dashboard</title>
		<meta charset="utf-8"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="dashboard_style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
			<h1>Results Dashboard</h1>
        </header>
        <button id="custom-button-return" onclick="location.href='teacher_dashboard.php'">Return</button>
		<form style="display: inline" action="logout.php" method="get">
  			<button id="custom-button-logout" type="submit">Logout</button>
		</form>
        <div id="results">
        <table id="results-table">
            <thead>
                <tr>
                    <th></th>
                    <th><?php echo $quizNames[0] ?></th>
                    <th><?php echo $quizNames[1] ?></th>
                    <th><?php echo $quizNames[2] ?></th>
                    <th><?php echo $quizNames[3] ?></th>
                    <th><?php echo $quizNames[4] ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $quizScoresQuery = "SELECT username, quiz1_score, quiz2_score, quiz3_score, quiz4_score, quiz5_score FROM users";
                    $quizScoresQueryResult = $conn->query($quizScoresQuery);
                    while ($row = $quizScoresQueryResult->fetch_assoc()) {
                        $username = $row["username"];
                        $quiz1_score = $row["quiz1_score"];
                        $quiz2_score = $row["quiz2_score"];
                        $quiz3_score = $row["quiz3_score"];
                        $quiz4_score = $row["quiz4_score"];
                        $quiz5_score = $row["quiz5_score"];
                        echo "<tr><td>$username</td><td>$quiz1_score</td><td>$quiz2_score</td><td>$quiz3_score</td><td>$quiz4_score</td><td>$quiz5_score</td></tr>";
                    }
                    echo "<tr><td></td><td><button type='submit' form='reset' name='quiz_reset_button' value='1'>Reset Scores</button></td>
                    <td><button type='submit' form='reset' name='quiz_reset_button' value='2'>Reset Scores</button></td>
                    <td><button type='submit' form='reset' name='quiz_reset_button' value='3'>Reset Scores</button></td>
                    <td><button type='submit' form='reset' name='quiz_reset_button' value='4'>Reset Scores</button></td>
                    <td><button type='submit' form='reset' name='quiz_reset_button' value='5'>Reset Scores</button></td></tr>";
                ?>
            </tbody>
        </table>
        <form id="reset" action="reset_quiz.php" method="POST"></form>
    </div>
	</body>
</html>