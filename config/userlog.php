<?php
    session_start();
    include('databasecon.php');
  
    if (isset($_POST['username']) && isset($_POST['password'])) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);

        if(empty($username) || empty($password)){
            header("Location: ../login.php");
            $_SESSION['log_message'] = "Please enter your credentials.";
            exit();
        } else {
            $sql = "SELECT * FROM user_table WHERE username='$username' AND password='$password'";
		    $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['username'] === $username && $row['password'] === $password) {
                    $_SESSION['user'] = $row['username'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['user_auth'] = true;
                    header("Location: ../index.php");
                    exit();
                }else{
                    header("Location: ../login.php");
                    $_SESSION['log_message'] = "Incorect User name or password.";
                    exit();
                }
            } else{
                header("Location: index.php?error=Incorect User name or password");
                exit();
            }
        }
    } else{
        header("Location: ../index.php");
        exit();
    }
?>