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
        <button class="custom-button-return" onclick="location.href='teacher_dashboard.php'">Return</button>
		<form style="display: inline" action="logout.php" method="get">
  			<button id="custom-button-logout" type="submit">Logout</button>
        </form>
        <!-- Several submit buttons with different values inside one form 
        to send the number of the quiz that needs to be edited to the next page -->
        <!-- Future development: There will be a button to close/open quizzes from this view. 
        Buttons will be moved next to the header and button texts replaced with icons -->
        <form action="question_editor.php" method="POST">
            <h2><?php echo $quizNames[0] ?></h2>
            <button class="custom-button-edit" type="submit" name="quiz_select" value="1">Edit Questions</button>
            <h2><?php echo $quizNames[1] ?></h2>
            <button class="custom-button-edit" type="submit" name="quiz_select" value="2">Edit Questions</button>
            <h2><?php echo $quizNames[2] ?></h2>
            <button class="custom-button-edit" type="submit" name="quiz_select" value="3">Edit Questions</button>
            <h2><?php echo $quizNames[3] ?></h2>
            <button class="custom-button-edit" type="submit" name="quiz_select" value="4">Edit Questions</button>
            <h2><?php echo $quizNames[4] ?></h2>
            <button class="custom-button-edit" type="submit" name="quiz_select" value="5">Edit Questions</button>
        </form>
	</body>
</html>