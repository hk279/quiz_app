<?php
//Defines that the user has started the login process.
if (isset($_POST['submitButton'])) {
	define('LOGGING_IN', true);
	include_once '../user_validation.php';
	login_process();
} else {
?>

<!DOCTYPE html>
<HTML lang="en">

<head>
	<title>Quiz App</title>
	<meta charset="utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="login_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<header>
		<h1>Welcome to the Quiz App</h1>
	</header>
	<div>
		<h2>Login</h2>
		<form id="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<p>Username: </p>
			<input type="text" name="username"><br>
			<p>Password: </p>
			<input type="password" name="password"><br><br>
			<input type="submit" name="submitButton" value="Login">
		</form>
		<br>
	</div>
	<div id="output">
		<?php 
			$returnedOutput = $_GET['output']; 
			echo $returnedOutput;
		?>
	</div>
	<br>
	<a href="../sign_up/sign_up.php">Create a new user</a>
</body>

</html>

<?php

}
?> 