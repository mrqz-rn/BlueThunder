<?php
    include('databasecon.php');


// DATA FROM USER INPUTS
    $lastname = ($_POST["firstname"]);
    $firstname = ($_POST["lastname"]);
    $username = ($_POST["username"]);
    $email = ($_POST["email"]);

    $password = ($_POST["password"]);
    $conpswd = ($_POST["conpswd"]);

// Concatenate for Address_variable
    $contact = ($_POST["contact"]);
    $houseNo = ($_POST["houseNo"]);
    $baranggay = ($_POST["baranggay"]);
    $city = ($_POST["city"]);
    $province = ($_POST["province"]);
    $region = ($_POST["region"]);
    $postal = ($_POST["postal"]);
    $address = $houseNo .", ". $baranggay .", ". $city .", ". $province.", ". $region .", ". $postal;

// CHECKING OF REQUIRED FIELDS
    if(empty($lastname)){
        header("Location: ../registration.php");
        $_SESSION['log_message'] = "Please fillup the required fields.";
        exit();
    } else if(empty($firstname)){
        header("Location: ../registration.php");
        $_SESSION['log_message'] = "Please fillup the required fields.";
        exit();
    }else if(empty($username)){
        header("Location: ../registration.php");
        $_SESSION['log_message'] = "Please fillup the required fields.";
        exit();
    } else if(empty($email)){
        header("Location: ../registration.php");
        $_SESSION['log_message'] = "Please fillup the required fields.";
        exit();
    } else if(empty($password)){
        header("Location: ../registration.php");
        $_SESSION['log_message'] = "Please fillup the required fields.";
        exit();
    } else if(empty($conpswd)){
        header("Location: ../registration.php");
        $_SESSION['log_message'] = "Please fillup the required fields.";
        exit();
    } else if(empty($contact)){
        header("Location: ../registration.php");
        $_SESSION['log_message'] = "Please fillup the required fields.";
        exit();
    } else if(empty($houseNo)){
        header("Location: ../registration.php");
        $_SESSION['log_message'] = "Please fillup the required fields.";
        exit();
    } else if(empty($baranggay)){
        header("Location: ../registration.php");
        $_SESSION['log_message'] = "Please fillup the required fields.";
        exit();
    } else if(empty($city)){
        header("Location: ../registration.php");
        $_SESSION['log_message'] = "Please fillup the required fields.";
        exit();
    }

	if($password !== $conpswd){
        header("Location: ../registration.php");
        $_SESSION['log_message'] = "Password does not match.";
	    exit();
	} else {
        $sql1 = "SELECT * FROM user_table WHERE username='$username' ";
        $sql2 = "SELECT * FROM user_table WHERE email='$email' ";
        $sql3 = "SELECT * FROM user_table WHERE phone='$contact' ";
		$result1 = mysqli_query($con, $sql1);
        $result2 = mysqli_query($con, $sql2);
        $result3 = mysqli_query($con, $sql3);


// CHECK IF USERNAME,EMAIL,PHONE IS UNIQUE
        if (mysqli_num_rows($result1) > 0) {
            header("Location: ../registration.php");
            $_SESSION['log_message'] = "Username has been already taken.";
            exit();
        } else if (mysqli_num_rows($result2) > 0) {
            header("Location: ../registration.php");
            $_SESSION['log_message'] = "Email Already in Use.";
            exit();
        } else if (mysqli_num_rows($result3) > 0) {
            header("Location: ../registration.php");
            $_SESSION['log_message'] = "Contact Already in Use.";
	        exit();
        } else {

// ADD USER INPUT TO THE DATABASE
            $sql_add = "INSERT INTO user_table (firstname,lastname,username,email,password,phone,address) 
            VALUES('$firstname','$lastname','$username','$email','$password','$contact','$address')";
            $result_add = mysqli_query($con, $sql_add);

            if($result_add){
                header("Location: ../index.php");
                $_SESSION['log_message'] = "Your account has been created successfully.";
                $_SESSION['user'] = $username;
                $_SESSION['user_auth'] = true;
	            exit();
            }
        }

    }

?>