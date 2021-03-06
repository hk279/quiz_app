<?php
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
                //User type is checked
                if ($row["type"] == "admin") {
                    $_SESSION['valid_admin'] = true;
                }
            }
            //If logging in with admin credentials, directs to the teacher dashboard.
            if (isset($_SESSION["valid_admin"])) {
                die(header("Location:../teacher/teacher_dashboard.php"));
            } else {
                die(header("Location:../quizzes/quiz_index.php"));
            }
        }
        else {
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
        if( !isset($_SESSION['valid_user']) ) {
            die(header('location:'.URL_LOGIN_PAGE));
        }
    }

    //Admin verification.
        function verify_if_valid_admin() {
            if(!isset($_SESSION['valid_admin'])) {
                die(header('location:'.URL_LOGIN_PAGE));
            }
        }
?>