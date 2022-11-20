<?php
    session_start();
    include('databasecon.php');

        $username = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']);

        $login_query = " SELECT  * FROM user_table WHERE username='$username' AND password='$password'";
        $login_query_run1 = mysqli_query($con, $login_query);

        $_SESSION['user']= $username;
        // CHECK if the user data is in the table
        if(mysqli_num_rows($login_query_run1) > 0){
                $_SESSION['client_session'] = true;
                $userdata = mysqli_fetch_array($login_query_run1);
                $username = $userdata['username'];
                $useremail = $userdata['email'];
                echo "<script>window.location.href='index.php';</script>";
        } else {
            $userdata = mysqli_fetch_array($login_query_run1);
            $username = $userdata['username'];
            $useremail = $userdata['email'];

            $_SESSION['log_message'] = "Invalid Credentials";

        }
        
?>