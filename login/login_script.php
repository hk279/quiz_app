<?php
	$username = $_POST["username"];
	$password = $_POST["password"];

	$servername = "127.0.0.1:52503";
	$dbusername = "azure";
	$dbpassword = "6#vWHD_$";
	$dbname = "quiz_app";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    
	$authentication = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
	$authentication_result = $conn->query($authentication);

	if ($authentication_result->num_rows == 1) {

	} else {
	  die(header('location: login.php'));
	}
	

	//connection check
	if ($conn->connect_error) { 
		die("Connection failed: " . $conn->connect_error); 
	}
?>