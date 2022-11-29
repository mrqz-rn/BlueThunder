<?php
    function getALL($table){
        global $con;
        $query_tab = "SELECT * FROM $table";
        return $query_tab_run = mysqli_query($con, $query_tab);
    }
    
    function getProductID($table, $productID){
        global $con;
        $query_tab = "SELECT * FROM $table WHERE product_id = '$productID'";
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
    function getByUserID($ID){
        global $con;
        $query_tab = "SELECT * FROM user_table WHERE id = '$ID'";
        return $query_tab_run = mysqli_query($con, $query_tab);
    }
    function getTransaction($tID){
        global $con;
        $query_tab = "SELECT * FROM transaction_table WHERE transaction_code = '$tID'";
        return $query_tab_run = mysqli_query($con, $query_tab);
    }
    function getOrders($OR_id){
        global $con;
        $query_tab = "SELECT * FROM order_table WHERE order_id = '$OR_id'";
        return $query_tab_run = mysqli_query($con, $query_tab);
    }
    function getUser($table,$username){
        global $con;
        $query_tab = "SELECT * FROM $table WHERE username = '$username' ";
        return $query_tab_run = mysqli_query($con, $query_tab);
    }
    
?>