<?php
    include('databasecon.php');
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


    
?>