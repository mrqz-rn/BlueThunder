<?php
session_start();

if(isset($_SESSION['auth'])){
    echo "<script>window.location.href='index.php';</script>";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!---- BOOTSTRAP----->
    <link href="assets/css/Bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/lrstyle.css">
    <link rel="icon" href="assets/img/icon.png">
    <title>BlueThunder Admin</title>
</head>

<body>

    <div class="parent clearfix">

        <div class="bg-illustration">
            <img src="assets/img/B_logo.png" alt="logo">
            <div class="centered"> 
                <h3 class="caption">Forever</h3>
                <h3 class="caption">true to the</h3>
                <h3 class="caption">Gold and Blue</h3>
            </div>
        </div>



        <div class="login" id="loginform">
            <div class="form-container">
                
                <div class="container">
                    
                    <h1 style="padding-top: 20px; color: black;">ADMIN</h1>
                    <div class="login-form" id="smdev">

                        <?php     
                        if(isset($_SESSION['log_message']))
                        { ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Error!</strong> <?= $_SESSION['log_message'];?>
                        </div>
                        <?php 
                        unset($_SESSION['log_message']);
                        } ?>
                        <!---- CREATE A PHP FILE DATABASE CONNECTION----->
                        <form action="config/login-function.php" method="post" >
                            <div class="mb-2 center" style="width: 280px;">
                                <input type="username" class="form-control" placeholder="username" name="username">
                            </div>
                            <div class="mb-2 center" style="width: 280px;">
                                <input type="password" class="form-control" placeholder="password" name="password">
                                
                            </div> 
                            <div class="center">
                                <button class="center ms-0" type="submit" name="login-btn">Log In</button>
                            </div>
                            <div class="center mb-3">
                                <h6>New to BlueThunder? <span><b><a href="registration.php">Create an Account</a></b></span></h6>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!---- BOOTSTRAP----->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>
