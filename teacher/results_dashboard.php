<?php
include_once '../user_validation.php';
verify_if_valid_admin();

$student = $_POST["students"];
$quiz = $_POST["quizzes"];

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
        <form>
            <input list="students" name="students">
            <datalist id="students">
                <!-- List of students as options here -->
                <?php
                    for ($i = 0; $i < count($studentUsernames); $i++) {
                        echo "<option>$studentUsernames[$i]</option>";
                    }
                ?>
            </datalist>
            <input list="quizzes" name="quizzes">
            <datalist id="quizzes">
                <!-- List of quizzes as options here -->
                <?php
                    for ($i = 0; $i < count($quizNames); $i++) {
                        echo "<option>$quizNames[$i]</option>";
                    }
                ?>                
            </datalist>
            <input id="custom-button-search" type="submit" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" value="Search">
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
                ?>
            </tbody>
        </table>
    </div>
	</body>
</html>