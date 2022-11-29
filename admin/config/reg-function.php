<?php

include('databasecon.php');

    // DATA FROM USER INPUTS
    $lastname = $_POST["firstname"];
    $firstname = $_POST["lastname"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $Username = $_POST["Username"];

    $password = $_POST["password"];
    $conpswd = $_POST["conpswd"];

    // Contatenate for Address_variable
    $houseNo = $_POST["houseNo"];
    $baranggay = $_POST["baranggay"];
    $city = $_POST["city"];
    $province = $_POST["province"];
    $region = $_POST["region"];
    $postal = $_POST["postal"];
    
    $address = $houseNo .", ". $baranggay .", ". $city .", ". $province.", ". $region .", ". $postal;
    // END_DATA FROM USER INPUTS

  
          if($password == $conpswd){
        $insert_query = "INSERT INTO user_table (firstname,lastname,email,contact,Username,password,houseNo,baranggay,city,province,region,postal,address)
        VALUES ('$firstname',' $lastname', '$email', '$contact', '$Username', '$password', '$houseNo', '$baranggay', '$city', '$province', '$region','$postal','$address')";
          
        $insert_query_run = mysqli_query($con, $insert_query);
        
        if($insert_query_run) {
            echo "<script>window.location.href='index.html';</script>";
            exit; 
        } else {
            echo ">>>>>>>>>>> There is an error! <<<<<<<<<<<<";
        }

    } else {
        echo "<script>window.location.href='registration.html';</script>";
        exit;
    }


?>