<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['name'];
}
?>

<!DOCTYPE html>
<HTML lang="en">
	<head>
		<title>Quiz App</title>
		<meta charset="utf-8"/>
		<link href="sign_up_style.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<h2>Welcome to the Quiz App</h2>
		</header>
		<div id="new-user">
			<?php
				$returnedEmail = $_GET['email'];
				$returnedUsername = $_GET['username'];
				$returnedOutput = $_GET['output'];
			?>
			<form action="sign_up_script.php" method="POST">
				<h3>Create An Account:</h3>
				<p>Enter Your Email Address: </p> 
				<input id="email" type="text" name="email" value="<?php echo $returnedEmail; ?>"><br>
				<p>Choose a Username: </p>
				<input id="username" type="text" name="username" value="<?php echo $returnedUsername; ?>"><br>
				<p>Password: </p>
				<input id="password" type="password" name="password"><br>
				<p>Confirm Password: </p>
				<input id="confirm" type="password" name="confirm"><br><br>
				<input type="submit" name="submit" value="Create User">
			</form>
			<br>
		</div>
		<div id="output">
			<?php echo $returnedOutput; ?>
		</div>
		<a href="../login/login.php">Login page</a>
	</body>
</html>