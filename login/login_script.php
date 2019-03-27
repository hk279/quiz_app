<?php
	include("user_validation.php");

	$username = $_POST["username"];
	$password = $_POST["password"];

	if (isset($_POST['submitButton'])) {
		define('LOGGING_IN', true);
		include_once('./user_validation.php');
		login_process();
	}
?>