<?php 
include('databasecon.php');

function getUser($table,$username){
    global $con;
    $query_tab = "SELECT * FROM $table WHERE username = '$username' ";
    return $query_tab_run = mysqli_query($con, $query_tab);
}
// FETCH ALL DATA FROM TABLE
function getALL($table){
    global $con;
    $query_tab = "SELECT * FROM $table";
    return $query_tab_run = mysqli_query($con, $query_tab);
}
// FETCH TOP 4 NEW PRODUCT
function getALL4new($table){
    global $con;
    $query_tab = "SELECT * FROM $table ORDER BY create_at DESC LIMIT 0,4";
    return $query_tab_run = mysqli_query($con, $query_tab);
}
// FETCH PRODCUT ACCORDING TO CATEGORY
function getProductCat($table, $productCat){
    global $con;
    if( $productCat != 'All'){
        $query_tab = "SELECT * FROM $table WHERE category = '$productCat'";
    } else {
        $query_tab = "SELECT * FROM $table";
    }
    return $query_tab_run = mysqli_query($con, $query_tab);
}
// FETCH SINGLE PRODUCT
function getProduct($table,$pID){
    global $con;
    $query_tab = "SELECT * FROM $table WHERE product_id = '$pID'";
    return $query_tab_run = mysqli_query($con, $query_tab);
}
// FETCH CLIENT CART
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
// FETCH # of ITEMS in CART
function getCartNum($table, $clientNAME){
    global $con;
    global $clientId;
    global $cartTotal;
    $user_sql = "SELECT * FROM user_table where username = '$clientNAME' ";
    $user_sql_run = mysqli_query($con, $user_sql);
    if(mysqli_num_rows($user_sql_run) > 0){
        foreach($user_sql_run as $customerData){ 
        $clientId = $customerData['id'];
        }
    }
    $cart_count = "SELECT * FROM cart_table WHERE user_id = '$clientId' ";
    $cart_count_run = mysqli_query($con, $cart_count);
        foreach($cart_count_run as $cartDATA){ 
            $cartTotal +=  $cartDATA['quantity'];
        }
     return $cartTotal;
}
// FETCH PRODUCT REVIEW
function getReview($table, $productNum){
    global $con;
    $review_sql = "SELECT * FROM review_table WHERE product_id = '$productNum' ";
    return $review_sql_run = mysqli_query($con, $review_sql);
}


// ADDING PRODUCT TO THE CART
if( isset($_POST['addprodtocart']) ){
    $customer =  $_POST['client'];

    if(isset($customer)){
        global $con;
        $prodID = $_POST['p_ID'];
        $pQTY = $_POST['p_QTY'];
        $prodPrice = $_POST['p_Price'];
        $subtotal = $pQTY * $prodPrice;
        // Get REFERENCE id from user_table
        $user_sql = "SELECT * FROM user_table where username = '$customer' ";
        $user_sql_run = mysqli_query($con, $user_sql);
        if(mysqli_num_rows($user_sql_run) > 0){
            foreach($user_sql_run as $customerData){ 
                $customerID = $customerData['id'];
            }
        } else {
            echo "there is an error 1";
        }

        // Add Duplicate Item to Cart
        $dupcheck = "SELECT * FROM cart_table WHERE user_id = '$customerID' AND product_id = '$prodID'";
        $dupcheck_run = mysqli_query($con, $dupcheck);
        if(mysqli_num_rows($dupcheck_run) > 0){
            foreach($dupcheck_run as $dupItem){
                $current_QTY = $dupItem['quantity'];
                $current_Subtotal = $dupItem['subtotal'];
            }
            $new_QTY = $current_QTY + $pQTY;
            $new_Subtotal = $current_Subtotal + $subtotal;
            $update_QTY_sql = "UPDATE cart_table SET quantity = '$new_QTY', subtotal = '$new_Subtotal' WHERE user_id = '$customerID' AND product_id = '$prodID'";
            $update_QTY_sql_run = mysqli_query($con, $update_QTY_sql);
            if($update_QTY_sql_run){
                $_SESSION['cart_message']  = "Product added to your cart";
                header('Location: ../view-product.php');
                exit();
            }

        } else {
            // Add New Item To Cart
            $cart_sql = "INSERT INTO cart_table(user_id, product_id, quantity, price, subtotal) 
            VALUES ('$customerID', '$prodID', '$pQTY', '$prodPrice', '$subtotal')";
            $cart_sql_run = mysqli_query($con, $cart_sql);
            if($cart_sql_run){ 
                $_SESSION['cart_message']  = "Product added to your cart";
                header('Location: ../view-product.php');
                exit();
            } else {
                $_SESSION['cart_message']  =  "There is an error";
                header('Location: ../view-product.php');
                exit();
            }
        }

    } else {
        $_SESSION['userNOTIF']  = "You Need To Login First";
        header('Location: ../view-product.php');
        exit();
    }
    
}


// ADDING PRODCUT REVIEW
if( isset($_POST['addReview']) ){
    $prodID = $_POST['p_ID'];
    $review = $_POST['reviewtext'];
    $customer =  $_SESSION['user'];

    $addreview_sql = "INSERT INTO review_table(product_id, customer_username, feedback) 
                    VALUES('$prodID','$customer', '$review')";
    $addreview_sql_run = mysqli_query($con, $addreview_sql); 
    if($addreview_sql_run){
        $_SESSION['cart_message']  =  "Thank You!. Your Review submitted successfully";
        header('Location: ../view-product.php');
        exit(); 
    } 
}


// ORDER CONFIRMATION
if(isset($_POST['confirm-order'])){
    $year = date("Y");
    $month = date("m");
    $limit = $month * 1000;
    $trans_code = $year.$limit;
    $customer_id = $_POST['c_id'];
    $customer_phone = $_POST['c_phone'];
    $customer_address = $_POST['c_address'];
    $customer_payment =  $_POST['payment_op'];
    $customer_courier =  $_POST['c_courier'];
    $OR_total = $_POST['order_total'];

    if($customer_courier != null){

    ///// CREATE TRANSACTION RECORD //////
    $add_trans = "INSERT INTO transaction_table(customer_id, contact, delivery_address, courier, payment, total) 
                VALUES('$customer_id','$customer_phone','$customer_address','$customer_courier','$customer_payment','$OR_total')";
    $add_trans_run = mysqli_query($con, $add_trans);
    if($add_trans_run){
        $codegen = mysqli_query($con, "SELECT  MAX(order_id) as max FROM transaction_table");
        while($last_id = mysqli_fetch_array($codegen)) { 
            $t_id = $last_id['max']; 
            $finalcode = $trans_code + $t_id ; 
            $insertcode = "UPDATE transaction_table SET transaction_code = '$finalcode' WHERE order_id = '$t_id' ";
            $insertcode_run = mysqli_query($con, $insertcode);
            echo "Order Confirmed"; 
            echo $finalcode;
            }
    }
    //// ADD CART ITEMS in ORDER TABLE ///// 
    $query_cart = "SELECT * FROM cart_table WHERE user_id = '$customer_id'";
    $query_cart_run = mysqli_query($con, $query_cart);
    if(mysqli_num_rows($query_cart_run) > 0){
        foreach($query_cart_run as $Items){
            $productID = $Items['product_id'];
            $productPRICE = $Items['price'];
            $productQUANTITY = $Items['quantity'];
            $productSUBTOTAL = $Items['subtotal'];
            $create_order = "INSERT INTO order_table(order_id, product_id, quantity, price, subtotal) 
                        VALUES('$t_id','$productID','$productQUANTITY','$productPRICE','$productSUBTOTAL')";
            $create_order_run = mysqli_query($con, $create_order);

            ///  UPDATE PRODUCT STOCK AND SOLD /// 
            $select_product = "SELECT * FROM product_table WHERE product_id = '$productID' ";
            $select_product_run = mysqli_query($con, $select_product);
            if(mysqli_num_rows($select_product_run) > 0){
                foreach($select_product_run as $pData){
                    $product_stock = $pData['num_stock'];
                    $product_sold = $pData['sold'];
                }
            }
            $new_stock = $product_stock - $productQUANTITY;
            $new_sold = $product_sold + $productQUANTITY;
            $update_stock = "UPDATE product_table SET num_stock = '$new_stock', sold = '$new_sold' WHERE product_id = '$productID' ";
            $update_stock_run = mysqli_query($con, $update_stock);

            ///  DELETE ITEMS IN CART /// 
            $delete_cart = "DELETE FROM cart_table WHERE user_id = '$customer_id'";
            $delete_cart_run = mysqli_query($con, $delete_cart); 
            }
        }
        $_SESSION['check-msg'] = "Your Pruchase was Successful";
        header('Location: ../index.php');
        exit(); 
    } else {
        $_SESSION['check-msg'] = "Please select a courier";
        header('Location: ../checkout.php');
        exit(); 
    }
}

if(isset($_POST['del-cart-item'])){
    $cartID = $_POST['cart_item'];
    echo $cartID;

    $delCartItem = "DELETE FROM cart_table WHERE cart_id = '$cartID' ";
    $delCartItem_run = mysqli_query($con, $delCartItem);

    if($delCartItem_run){
        $_SESSION['cart-msg'] = "Product has been removed.";
        header('Location: ../cart.php');
        exit();
    }
}

// UPDATE USER DETAILS
if(isset($_POST['update-account'])){
    $user_id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $old_image = $_POST['old_image'];
    $new_image = $_FILES['image']['name'];
    $path = "../admin/images/user-image/";
    $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    if($new_image != null){
        $update_filename = $new_image;
    } else {
        $update_filename = $old_image;
    }
    if($password != null){
        $edit_prod_sql = "UPDATE user_table SET lastname = '$lastname',firstname= '$firstname',email= '$email',
                        phone= '$contact',address= '$address', image = '$update_filename', password = '$password' WHERE id = '$user_id'";
    } else {
        $edit_prod_sql = "UPDATE user_table SET lastname = '$lastname',firstname= '$firstname',email= '$email',
                        phone= '$contact',address= '$address', image = '$update_filename' WHERE id = '$user_id'";
    }
    $edit_prod_sql_run = mysqli_query($con, $edit_prod_sql);

    if($edit_prod_sql_run){
        if($_FILES['image']['name'] != ""){
            move_uploaded_file($_FILES['image']['tmp_name'] , $path.'/'.$new_image);
        } 
        $_SESSION['edit_msg'] = "Account updated successfully";
        header('Location: ../user/account.php');
        exit();
    } else {
        $_SESSION['edit_msg'] = "There is an error";
        header('Location: ../user/account.php');
        exit();
    }
}
?>