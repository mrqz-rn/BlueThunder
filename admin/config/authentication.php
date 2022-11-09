<?php    
session_start();
if(isset($_SESSION['auth'])){
    
} else {
    echo "<script>window.location.href='login.php';</script>";
}
?>