<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Teacher Dashboard</title>
		<meta charset="utf-8"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="dashboard_style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
			<h1>Teacher Dashboard</h1>
		</header>
		<form style="display: inline" action="logout.php" method="get">
  			<button id="custom-button-logout" type="submit">Logout</button>
		</form>
		<div class="dashboard-panel" onclick="location.href='results_dasboard.php'">
            <h2 class="dasboard-panel-header">View Results</h2>
        </div>
        <div class="dashboard-panel" onclick="location.href='quiz_editor.php'">
            <h2 class="dasboard-panel-header">Edit Quizzes</h2>
        </div>
	</body>
</html>