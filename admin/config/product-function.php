<?php 

include('databasecon.php');



// Product Add-Function
if(isset($_POST['add-prod-btn'])){
    $name = $_POST['productname'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $status = $_POST['status'];

    $image = $_FILES['image']['name'];
    $path = "../images/product-image";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;
   

    $add_prod_sql = "INSERT INTO product_table (product_name,category,description,price,num_stock,status,image)
    VALUES ('$name','$category','$description','$price','$stock','$status','$filename') ";
    
    $add_prod_sql_run = mysqli_query($con,$add_prod_sql);
    if($add_prod_sql_run){
        move_uploaded_file($_FILES['image']['tmp_name'] , $path.'/'.$filename);
        $_SESSION['add_msg'] = "Product added successfully";
        header('Location: ../product/add-prod.php');
        exit();
    } else {
        $_SESSION['add_msg'] = "There is an error";
        header('Location: ../product/add-prod.php');
        exit();
    }
}

// Product Update-Function
if(isset($_POST['edit-prod-btn'])){
    $prodID = $_POST['prodID'];
    $name = $_POST['productname'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $status = $_POST['status'];

    $old_image = $_POST['old_image'];

    $new_image = $_FILES['image']['name'];
    $path = "../images/product-image";
    $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;


    if($new_image != null){
        $update_filename = $new_image;
    } else {
        $update_filename = $old_image;
    }

    $edit_prod_sql = "UPDATE product_table SET product_name = '$name',category= '$category',description= '$description',
                    price= '$price',num_stock= '$stock',status= '$status',image= '$update_filename' WHERE product_id = '$prodID'";

    $edit_prod_sql_run = mysqli_query($con, $edit_prod_sql);

    if($edit_prod_sql_run){
        if($_FILES['image']['name'] != ""){
            move_uploaded_file($_FILES['image']['tmp_name'] , $path.'/'.$new_image);
        } 
        $_SESSION['edit_msg'] = "Product updated successfully";
        header('Location: ../product/productlist.php');
        exit();
    } else {
        $_SESSION['edit_msg'] = "There is an error";
        header('Location: ../product/productlist.php');
        exit();
    }
}

if(isset($_POST['del-prod-btn'])){
    echo "deleting";

    $prodID = $_POST['prod-delID'];
    
    $del_prod_sql = "DELETE FROM product_table WHERE product_id = '$prodID' ";
    $del_prod_sql_run = mysqli_query($con, $del_prod_sql);

    if($del_prod_sql_run){
        $_SESSION['edit_msg'] = "Product deleted successfully";
        header('Location: ../product/productlist.php');
        exit();
    }else {
        $_SESSION['edit_msg'] = "There is an error";
        header('Location: ../product/productlist.php');
        exit();
    }

} else {
    echo "there is an error";
}


?>