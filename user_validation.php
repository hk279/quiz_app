<?php
    echo "Hello";
    ini_set("session_name", "s");    
    session_start();
    if( !defined('LOGGING_IN') ) {
        verify_if_valid_user();
    }

    function match_user_in_db($username, $password) {
        $wrongLoginMessage = "<br><p class='error'>Wrong username or password.</p>";
        $conn = new mysqli("127.0.0.1:52503", "azure", "6#vWHD_$", "quiz_app");

        //connection check
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error); 
        }

        $authentication = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $authentication_result = $conn->query($authentication);

        if ($authentication_result->num_rows == 1) {
            $_SESSION['valid_user'] = mysql_result($authentication_result, 0, 0);
            $conn->close();
            die(header("Location:../quizzes/quiz_index.html"));
        } else {
            die(header("Location:login.php?output=$wrongLoginMessage"));
        }
    }

    //Gets the entered username and password from the login page and runs the db match function with them as parameters.
    function login_process() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        match_user_in_db( $username, $password );  
    }

    function process_logout() {
        $loggedOutMessage = "<br><p class='error'>You are now logged out.</p>";
        session_destroy();
        unset( $_SESSION );
        die( header("location: login.php?output=$loggedOutMessage") );  
    }
    
    //User verification when not logging in.
    function verify_if_valid_user() {
        $noLoginMessage = "<br><p class='error'>You are not logged in</p>";
        if( !isset($_SESSION['valid_user']) ) {
            die(header("location: login.php?output=$noLoginMessage"));
        }
    }
?>