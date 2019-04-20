<?php
$student = $_POST["students"];
$quiz = $_POST["quizzes"];

$conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");

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
    <title>Results</title>
    <meta charset="utf-8" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="dashboard_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header>
        <h1>Results</h1>
    </header>
    <form style="display: inline" action="logout.php" method="get">
        <button id="custom-button-logout" type="submit">Logout</button>
    </form>
    <div id="results">
        <table id="results-table">
            <tbody>
                <tr>
                    <th></th>
                    <th><?php echo $quizNames[0] ?></th>
                    <th><?php echo $quizNames[1] ?></th>
                    <th><?php echo $quizNames[2] ?></th>
                    <th><?php echo $quizNames[3] ?></th>
                    <th><?php echo $quizNames[4] ?></th>
                </tr>
                <?php
                echo "<tr><td></td><td></td><td></td><td></td><td></td></tr>"
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>