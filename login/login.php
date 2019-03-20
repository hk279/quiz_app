<!DOCTYPE html>
<HTML lang="en">
	<head>
		<title>Quiz App</title>
		<meta charset="utf-8"/>
		<link href="login_style.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<h1>Welcome to the Quiz App</h1>
		</header>
		<div id="login" action="login_script.php" method="POST">
			<h2>Login</h2>
			<form>
				<p>Username: </p>
				<input type="text" name="username"><br>
				<p>Password: </p>
				<input type="password" name="password"><br><br>
				<input type="submit" name="submit" value="Login">
			</form>
			<br>
		</div>
		<div id="output">
		</div>
	</body>
	<a href="../sign_up/sign_up_1.php">Create a new user</a>
</html>