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
    <link rel="stylesheet" href="assets/css/productlist.css">
    <link rel="icon" href="assets/img/icon.png">
    
</head>
      
<body>
<!--- ------------footer icons kemers -------------->
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="facebook" viewBox="0 0 16 16">
    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
  </symbol>
  <symbol id="instagram" viewBox="0 0 16 16">
      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
  </symbol>
  <symbol id="twitter" viewBox="0 0 16 16">
    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
  </symbol>
</svg>
<!--- ------------footer icons kemers -------------->
    
    
<div class="navbar navbar-light" style="background-color: #FFD700;">
  <div class="container">
      
    <div class="col-md-4 col-xs-12 col-sm-4"> 
      <img src="assets/img/B_logo.png"  width="90px" height="85px">
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
<!----------------- BLACK NAVBAR-------------------->
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
<!----------------- BLACK NAVBAR--------------------->
 
    
    
<!---------------- PICTURE HEADER ---------------->      
     <nav class="pic-head" 
            style="
            height: 150px;
            background-image: linear-gradient(rgba(0,37,108,0.7), rgba(0,37,108,0.7)), url(assets/img/banner.jpg);
            background-repeat: no-repeat;
            background-size: cover;   ">                      
    </nav>
  <!---------------- PICTURE HEADER -----------------> 

    
    
    
  <!-------- BLUE HEADER --------> 
     <div class="container-fluid"
          style="
                background-color: #00256c;
                height: 60px;
                 ">
        <div class=" container navbar-brand" style="padding: 1.5px;">
        <?php 
         $prodCATEGORY;
         if(isset($_GET['category'])){
          $_SESSION['CATEGORY'] =  $_GET['category'];
          $productCAT = $_GET['category'];
          echo $productCAT;
         }
        ?>
         </div>
    </div>
 <!-------- BLUE HEADER ----------> 
    
        
        
    
    
<!----- PRODUCT DISPLAY ------>
<main>
  
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
        
        <?php 
          if(isset($_GET['category']) || $_SESSION['CATEGORY'] ){
            if(isset($_GET['category'])){
              $productCAT = $_GET['category'];
            } else if($_SESSION['CATEGORY'] ){
              $productCAT = $_SESSION['CATEGORY'];
            }
          
          $displayCAT = getProductCat("product_table", $productCAT);
          $productDATA;
          if(mysqli_num_rows($displayCAT) > 0){
            foreach($displayCAT as $productDATA){ 
        ?>
        <div class="col">
          <div class="card shadow-sm">
            <a href="view-product.php?product_id=<?= $productDATA['product_id']?>"><center><img src="admin/images/product-image/<?= $productDATA['image']?>" width="200" height="250" ></center> </a>
            <div class="card-body">
              <a href="view-product.php?product_id=<?= $productDATA['product_id']?>"><p class="card-text"><?= $productDATA['product_name']?></p></a>
              <div class=" align-items-center">
                <form action="config/user-function.php" method="post" enctype="multipart/form-data">
              <?php
                  if(isset($_SESSION['user'])){ ?>
                  <input type="hidden" name="client" value="<?= $_SESSION['user'];?>"> 
            <?php } else { 
                  $userNOTIF = "Please login first!";
                  } ?> 
                <div class="d-flex justify-content-between">
                  <span>Php <?= $productDATA['price']?></span>
                  <span> <?= $productDATA['sold']?> Sold</span>
                </div>
                </form>
                
              </div>
            </div>
          </div>
        </div>
        <?php  
          }
          } 
          } ?> 
        
      </div>
    </div>
  </div>   
  
  
</main> 
<!------------------- PRODUCT DISPLAY ------------------>
    
    
    
    
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
          <?php if(isset($_SESSION['cart_message'])){  ?>
          alertify.set('notifier','position', 'top-right');
          alertify.success('<?=$_SESSION['cart_message']?>'); 
          <?php unset($_SESSION['cart_message']);   } ?> 


          <?php if(isset($_SESSION['userNOTIF'])){  ?>
            alertify.alert(' <?= $_SESSION['userNOTIF']?> ').set('basic', true); 
          <?php unset($_SESSION['userNOTIF']);   } ?> 
      </script>
  
  </body>


</html>
