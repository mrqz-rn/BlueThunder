<?php 
include('databasecon.php');
global $con;
function getActiveID($table, $ID){
    global $con;
    $query_tab = "SELECT * FROM $table WHERE cetegory = '$ID' AND status = '0'";
    return $query_tab_run = mysqli_query($con, $query_tab);
}
function getALL($table){
    global $con;
    $query_tab = "SELECT * FROM $table";
    return $query_tab_run = mysqli_query($con, $query_tab);
}

function getALL4new($table){
    global $con;
    $query_tab = "SELECT * FROM $table ORDER BY create_at DESC LIMIT 0,4";
    return $query_tab_run = mysqli_query($con, $query_tab);
}

function getProductCat($table, $productCat){
    global $con;
    if( $productCat != 'All'){
        $query_tab = "SELECT * FROM $table WHERE category = '$productCat'";
    } else {
        $query_tab = "SELECT * FROM $table";
    }
    return $query_tab_run = mysqli_query($con, $query_tab);
}

function getProduct($table,$pID){
    global $con;
    $query_tab = "SELECT * FROM $table WHERE product_id = '$pID'";
    return $query_tab_run = mysqli_query($con, $query_tab);
}

function getCart($table,$clientNAME){
    global $con;
    global $clientId;
    $user_sql = "SELECT * FROM user_table where username = '$clientNAME' ";
    $user_sql_run = mysqli_query($con, $user_sql);
    if(mysqli_num_rows($user_sql_run) > 0){
    foreach($user_sql_run as $customerData){ 
    $clientId = $customerData['id'];
    }
    }
    $query_tab = "SELECT * FROM $table WHERE user_id = '$clientId'";
    return $query_tab_run = mysqli_query($con, $query_tab);
}

if(isset($_POST['addprodtocart'])){
    $customer =  $_POST['client'];


    if(isset($customer)){
        $prodID = $_POST['p_ID'];
        $pQTY = $_POST['p_QTY'];
        $prodPrice = $_POST['p_Price'];
    
        $user_sql = "SELECT * FROM user_table where username = '$customer' ";
        $user_sql_run = mysqli_query($con, $user_sql);
        if(mysqli_num_rows($user_sql_run) > 0){
            foreach($user_sql_run as $customerData){ 
                $customerID = $customerData['id'];
            }
        } else {
            echo "there is an error 1";
        }
    
        $cart_sql = "INSERT INTO cart_table(user_id, product_id, quantity, price) 
                    VALUES ('$customerID', '$prodID', '$pQTY', '$prodPrice')";
        $cart_sql_run = mysqli_query($con, $cart_sql);
        if($cart_sql_run){
            $_SESSION['cart_message']  = "Product added to your cart";
            header('Location: ../view-product.php');
            exit();
        } else {
            $_SESSION['cart_message']  = "There is an error";
            header('Location: ../view-product.php');
            exit();
        }
    } else {
        $_SESSION['userNOTIF']  = "You Need To Login First";
        header('Location: ../view-product.php');
        exit();
    }
    
}
?>