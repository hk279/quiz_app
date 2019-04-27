<?php
include_once '../user_validation.php';
verify_if_valid_admin();

$conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");

/* Getting student usernames from the db */
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

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Editor Dashboard</title>
		<meta charset="utf-8"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="dashboard_style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
			<h1>Editor Dashboard</h1>
        </header>
        <button id="custom-button-return" onclick="location.href='teacher_dashboard.php'">Return</button>
		<form style="display: inline" action="logout.php" method="get">
  			<button id="custom-button-logout" type="submit">Logout</button>
        </form>
        <form action="question_editor.php" method="POST">
            <p><?php echo $quizNames[0] ?></p>
            <input name="quizNumber" type="hidden" value="1">
            <input type="submit" value="Edit Questions">
        </form>
        <form action="question_editor.php" method="POST">
            <p><?php echo $quizNames[1] ?></p>
            <input name="quizNumber" type="hidden" value="2">
            <input type="submit" value="Edit Questions">
        </form>
        <form action="question_editor.php" method="POST">
            <p><?php echo $quizNames[2] ?></p>
            <input name="quizNumber" type="hidden" value="3">
            <input type="submit" value="Edit Questions">
        </form action="question_editor.php" method="POST">
        <form action="question_editor.php" method="POST">
            <p><?php echo $quizNames[3] ?></p>
            <input name="quizNumber" type="hidden" value="4">
            <input type="submit" value="Edit Questions">
        </form>
        <form action="question_editor.php" method="POST">
            <p><?php echo $quizNames[4] ?></p>
            <input name="quizNumber"  type="hidden" value="5">
            <input type="submit" value="Edit Questions">
        </form>
	</body>
</html>