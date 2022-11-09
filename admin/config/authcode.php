<?php

    session_start();
    include('databasecon.php');

    if(isset($_POST['registration_btn'])){
        $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
        $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $conpswd = mysqli_real_escape_string($con,$_POST['conpswd']);
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $phone = mysqli_real_escape_string($con,$_POST['phone']);
    }

    if($password==$conpswd){
        $insert_query = "INSERT INTO user_table (lastname,firstname,username,password,
        address,email,phone) VALUES ('$lastname','$firstname','$username','$password','$address','$email','$phone')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run){
            $_SESSION['message'] = "Registration Successful";
            header('Location : ../login.php');
        } else {
            $_SESSION['message'] = "Registration Unsuccessful";
            header('Location : ../registration.php');
        }

    }else {
        $_SESSION['message'] = "Registration Unsuccessful";
            header('Location : ../registration.php');

    }



    




    
?>