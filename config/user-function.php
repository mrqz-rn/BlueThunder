<?php 
include('databasecon.php');
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



?>