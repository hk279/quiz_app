<?php
    /* ini_set("session.name", "s"); */
    session_start();
    define('URL_LOGIN_PAGE', '../login/login.php');

    if( !defined('LOGGING_IN') ) {
        verify_if_valid_user();
    }

    function match_user_in_db($username, $password) {

        $conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");
        $wrongLoginMessage = "<br><p class='error'>Wrong username or password.</p>";

        //connection check
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error); 
        }

        $authenticationQuery = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $authenticationResult = $conn->query($authenticationQuery);

        if ($authenticationResult->num_rows == 1) {
            while($row = mysqli_fetch_assoc($authenticationResult)) {
                $_SESSION['valid_user'] = $row["username"];
            }
            $_SESSION['logged_in'] = true;
            die(header("Location:../quizzes/quiz_index.php"));
        } else {
            die(header("Location: login.php?output=$wrongLoginMessage"));
        }
    }

    //Gets the entered username and password from the login page and runs the db match function with them as parameters.
    function login_process() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        match_user_in_db( $username, $password );  
    }

    function logout_process() {
        session_destroy();
        unset( $_SESSION );
        die( header("location:".URL_LOGIN_PAGE) );  
    }
    
    //User verification when not logging in.
    function verify_if_valid_user() {
        echo $_SESSION['valid_user'];
        if( !isset($_SESSION['valid_user']) ) {
            die(header('location:'.URL_LOGIN_PAGE));
        }
        /* echo session_id(); */
        var_dump($_SESSION);
    }
?>