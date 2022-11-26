<?php
    session_start();
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "thunderdb";

    // DATABASE CONNECTION
    $con = mysqli_connect($host, $username, $password, $database);

    if(!$con){
        die("Connection Failed!". mysqli_connect_error());
    } 

?>