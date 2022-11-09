<?php
    session_start();
    include('databasecon.php');

        $username = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']);

        $login_query = " SELECT  * FROM user_table WHERE username='$username' AND password='$password' AND role=1";
        $login_query_run1 = mysqli_query($con, $login_query);

        $_SESSION['user']= $username;
        // CHECK if the user data is in the table
        if(mysqli_num_rows($login_query_run1) > 0){
                $_SESSION['auth'] = true;
                $userdata = mysqli_fetch_array($login_query_run1);
                $username = $userdata['username'];
                $useremail = $userdata['email'];
                $role = $userdata['role'];

                $_SESSION['auth_user'] = ['username' => $username, 'email' => $useremail];
                if($role == 1){
                    // Authorize user can only proceed to dashboard
                    $_SESSION['message'] = "Welcome to admin dashboard";
                    echo "<script>window.location.href='../index.php';</script>";
                }

        } else {
            $userdata = mysqli_fetch_array($login_query_run1);
            $username = $userdata['username'];
            $useremail = $userdata['email'];
            $role = $userdata['role'];

            if($role == 0){
                // Redirect user back to login
                $_SESSION['log_message'] = "You are not authorized to access this page";
                echo "<script>window.location.href='../login.php';</script>";
            } else{
                $_SESSION['log_message'] = "Invalid Credentials";
                echo "<script>window.location.href='../login.php';</script>";
            }
        }
        
?>