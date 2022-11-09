<br>
<?php

    session_start();
    include('databasecon.php');

    // DATA FROM USER INPUTS
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $username = $_POST["username"];

    $password = $_POST["password"];
    $conpswd = $_POST["conpswd"];

    // Contatenate for Address_variable
    $houseNo = $_POST["houseNo"];
    $baranggay = $_POST["baranggay"];
    $city = $_POST["city"];
    $province = $_POST["province"];
    $region = $_POST["region"];
    $postal = $_POST["postal"];
    
    $address = $houseNo .", ". $baranggay .", ". $city .", ". $province
    .", ". $region .", ". $postal;
    // END_DATA FROM USER INPUTS

    
    if($password == $conpswd){
        $insert_query = "INSERT INTO user_table (lastname,firstname,email,phone,username,password,address)
        VALUES ('$lastname','$firstname','$email','$phone','$username','$password','$address')";

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




