<?php
include('config/user-function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Thunder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <!-- ALERTIFY CSS  -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/img/icon.png">
</head>


<body>
    <!---- HEADER----->
    <div class="navbar navbar-light" style="background-color: #FFD700;">
      <div class="container">
          
        <div class="col-md-4 col-xs-12 col-sm-4"> 
          <img src="assets/img/B_logo.png"  width=90px" height="85px">
        </div>
        
        <div class="d-flex flex-row-reverse">
          <div class="icons">
            <ul class="top-menu text-right d-flex justify-content-center">
              <li class="dropdown search dropdown-slide">
                <a href="#!" data-toggle="dropdown"><i
                    class="fas fa-search"></i> </a>
                <ul class="dropdown-menu ">
                  <li>
                    <form action="post"><input type="search" class="form-control" placeholder="Search..."></form>
                  </li>
                </ul>
              </li>
              <li>
                <a href="cart.php"><i class="position-relative fas fa-shopping-cart"> 
                  <p class="position-absolute top-0 end-0 bg-primary text-light" style="margin-right: -5px; padding:2px 4px; border-radius:4px;">
                  <?php 
                    if(!isset($_SESSION['user'])){
                      echo "0";
                    } else {
                      $numCart = getCartNum("cart_table", $_SESSION['user']);
                      if($numCart == 0){
                        echo "0";
                      } else { echo $numCart; }   }
                    ?>  
                    </p></i>
               
                </a> 
              </li>
              <?php     
                  if(isset($_SESSION['user_auth']))
                  { ?>
              <li class=" nav-item dropdown"><a class=" dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown">
                <i class="fas fa-user position-relative"></i></a> 
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#!"><?php echo $_SESSION['user']; ?> </a></li>
                      <li><hr class="dropdown-divider" /></li>
                      <li><a class="dropdown-item" href="config/logout.php">Logout</a></li>
                </ul>
              </li> 
              <?php 
                  } else { ?>
                <li class=" nav-item dropdown"><a href="login.php" class="dropdown-toggle" id="navbarDropdown" >
                <i class="fas fa-user position-relative"></i></a> 
                
              </li> 
              <?php 
                  } ?>
              </li>
            </ul>
          </div>
      </div>
      
      </div>
    </div>
    <!---- HEADER----->

    <!---- NAVBAR----->
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #050404;">
      <div class="container">
        <button class="navbar-toggler" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="navlink mx-2"><a href="index.php" class="text-light">HOME</a></li>
            <li class="navlink dropdown dropdown-slide mx-2">
              <a href="#!" class="text-light" >PRODUCTS</a>
              <ul class="dropdown-menu">
                <li><a href="productlist.php?category=All" class="pro">ALL</a></li>
                <li><a href="productlist.php?category=Shirt" class="pro">SHIRTS</a></li>
                <li><a href="productlist.php?category=Jacket" class="pro">JACKETS</a></li>
                <li><a href="productlist.php?category=Bag" class="pro">TOTE BAGS</a></li>
                <li><a href="productlist.php?category=Other" class="pro">OTHERS</a></li>
              </ul>
            </li>
            <li class="navlink mx-2"><a href="about.php" class="text-light">ABOUT US</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!---- NAVBAR----->


    <!--  CONTENT-->
    <div class="page-wrapper p-4">
      <form action="config/user-function.php" method="post">
        <div class="container bg-gray p-4">
          <div class="col hr1 pb-2">
            <img src="assets/img/icon.png" alt="" class="checklogo">
            <label for=""><h5>BLUETHUNDER | Checkout</h5></label>
          </div>
          <div class="row p-2 "> 
            <div class="col d-data">
              <?php
              if(isset($_SESSION['user'])){
              $user = $_SESSION['user'];
              $getUserData = getUser('user_table',$user);
              if(mysqli_num_rows($getUserData) > 0){
              foreach($getUserData as $UserData){  ?> 
              <h5 class="pb-2">
              <i class="fas fa-map-marker-alt fs-5 me-2"></i>Delivery Details 
              <a href="user/edit-account.php"class="float-end clink"><span style="font-size:15px;">Change</span></a>
              </h5>
              <h6 class="px-2">Customer Name: <span class="deliver_info"><?=$UserData['firstname']?>  <?=$UserData['lastname']?></span></h6>
              <h6 class="px-2">Contact: <span class="deliver_info"><?=$UserData['phone']?></span></h6>
              <h6 class="px-2">Address: <span class="deliver_info"><?=$UserData['address']?></span></h6>
              <input type="hidden" name="c_id" value="<?=$UserData['id']?>">
              <input type="hidden" name="c_phone" value="<?=$UserData['phone']?>">
              <input type="hidden" name="c_address" value="<?=$UserData['address']?>">
              <?php
                    }
                    }
                    } ?>
                    
            </div>
          </div>
          <h5 class="py-2">Products Ordered</h5>
          <table class="table col">
          <?php 
              global $grandTotal;
              if(isset($_SESSION['user'])){
              $client = $_SESSION['user'];        
              $displayCART = getCart("cart_table", $client);
              if(mysqli_num_rows($displayCART) > 0){
              foreach($displayCART as $cartDATA){  ?>

              <tr class="align-middle">
                <?php 
                $displayPName = getProduct("product_table",$cartDATA['product_id']);
                if(mysqli_num_rows($displayPName) > 0){
                foreach($displayPName as $Pname){  ?>
                <td style="width: 50%;" class="px-5">
                  <img src="admin/images/product-image/<?= $Pname['image']?>" class="orderedimg">
                  <label class="mx-2"><?= $Pname['product_name']?></label>
                </td>
                <?php }} ?>
                <td style="width: 20%;"> <?= $cartDATA['price']?> </td>
                <td style="width: 20%;"> <?= $cartDATA['quantity']?> </td>
                <td style="width: 10%;"> <?= $cartDATA['subtotal']?> </td>
              </tr>
              <?php $grandTotal += $cartDATA['subtotal']; }}} ?>
              <input type="hidden" value = "<?=$grandTotal?>" name = "order_total">
          </table>
          <div class="row">
            <div class="payment col d-flex justify-content-start">
              <div class="px-1">
              <input type="radio" class="btn-check" name="payment_op"  autocomplete="off" checked value = "COD">
              <label class="btn btn-primary" for="option1">Cash on Delivery</label>
              </div>
              <div class="px-1">
              <input type="radio" class="btn-check" name="payment_op"  autocomplete="off" disabled>
              <label class="btn btn-outline-secondary" for="option3">Online Payment / e-Wallet</label>
              </div>
              <div class="px-1">
              <input type="radio" class="btn-check" name="payment_op"  autocomplete="off" disabled>
              <label class="btn btn-outline-secondary" for="option3">Online Bank </label>
              </div>

            </div>
            <div class="col d-flex justify-content-end">
            <div class="px-3">
              <select class="form-select form-select-sm" name = "c_courier">
                <option selected value="">Select Courier</option>
                <option value="J&T">J&T Exprees</option>
                <option value="JRS">JRS Express</option>
                <option value="NV">Ninja Van</option>
                <option value="2GO">2GO</option>
              </select>
              </div>
              <h6 class="pt-1">Order Total <span style="font-size: 13px;">(<?= $numCart;?> items)</span> : <b><?= $grandTotal;?></b> </h6>
            </div>
          </div>

          <div class=" d-flex justify-content-end">
            <button type="submit" class="btn btn-primary checkout-btn" name = "confirm-order">CONFIRM ORDER</button>
          </div>
        </div>
      </form>
    </div>






      <!-------------------     FOOTER  ---------------------->
<div class="bluefooter" style="background-color: #00256c">
  <div class="container">

  <footer class="py-4">
    <div class="row">
        
      <div class="col-6 col-md-2 mb-3 me-5" style="color: white;">
        <h5>About BlueThunder</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3 me-5" style="color: white;">
        <h5>Payment</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>
    
    
        
        
      <div class="col-md-5 offset-md-1 mb-3">
        <h5 style="color: white;">Follow us on</h5>
        <ul class="list-unstyled d-flex fs-3" >
            <li class="me-3">
                <a class="link-dark" href="#">
                  <i class="fab fa-twitter" style="color: white;"></i>
                </a>
              </li>
            <li class="me-3">
                <a class="link-dark" href="#">
                  <i class="fab fa-instagram" style="color: white;"></i>
                </a>
              </li>
            <li class="me-3">
                <a class="link-dark " href="#">
                  <i class="fab fa-facebook" style="color: white;"></i>
                </a>
              </li>
          </ul>
      </div>

    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-2 my-2 border-top">
      <p style="color: white;">&copy; 2022 BlueThunder. All rights reserved.</p>    
    </div>

  </footer>
   
</div>
</div>
<!-------------------     FOOTER  ---------------------->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
    <!---- ALERTIFY JS---->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
      <?php
      if( isset($_SESSION['check-msg']) ) { ?>
        alertify.error('<?=$_SESSION['check-msg']?>'); 
      <?php }
      unset($_SESSION['check-msg']); ?>
    </script>
  
  </body>


</html>