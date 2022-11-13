<?php

    $host = "sql212.epizy.com";
    $username = "epiz_32858737";
    $password = "8zvBhlQh26efU";
    $database = "epiz_32858737_thunderdb";

    // DATABASE CONNECTION
    $con = mysqli_connect($host, $username, $password, $database);

    if(!$con){
        die("Connection Failed!". mysqli_connect_error());
    } 

?>