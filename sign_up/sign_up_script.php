<?php
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$confirm = $_POST["confirm"];

	$conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");

	//connection check
	if ($conn->connect_error) { 
		die("Connection failed: " . $conn->connect_error); 
	}

	//Error messages are collected into this array.
	$errors = array();

	//empty input check
	if (empty($email) || empty($username) || empty($password) || empty($confirm)) {
		array_push($errors, "Please fill out all fields.");
	}

	//proper email check
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		array_push($errors, "Enter a valid email address.");
	}

	//password confirmation check
	if ($password != $confirm) {
		array_push($errors, "Password and confirmation do not match.");
	}

	//Existing email check
	$emailcheck = "SELECT email FROM users WHERE email = '$email'";
	$emailcheck_result = $conn->query($emailcheck); 

	if ($emailcheck_result->num_rows > 0) {
		array_push($errors, "An account with this email address already exists");
	}

	//Existing username check
	$usernamecheck = "SELECT username FROM users WHERE username = '$username'";
	$usernamecheck_result = $conn->query($usernamecheck); 

	if ($usernamecheck_result->num_rows > 0) {
		array_push($errors, "This username is taken");
	}

	//Existing password check
	$passwordcheck = "SELECT password FROM users WHERE password = '$password'";
	$passwordcheck_result = $conn->query($passwordcheck); 

	if ($passwordcheck_result->num_rows > 0) {
		array_push($errors, "This password is taken");
	}

	$output = "";

	if (count($errors) > 0) {
		for ($i = 0; $i < count($errors); $i++) {
			$output .= "<p class='error'>" . $errors[$i] . "</p>";
		}

		header("Location: sign_up.php?email=$email&username=$username&output=$output");
		die();
	} else {
		$sql = "INSERT INTO users (password, email, username) VALUES ('$password', '$email', '$username')";

		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

		$output = "<h2>The account was created successfully!</h2>";
		header("Location: sign_up.php?output=$output");
	}
?>