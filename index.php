<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Thunder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
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
                  <a href="cart.html"><i class="position-relative fas fa-shopping-cart"> 
                    <p class="position-absolute top-0 end-0 bg-primary text-light" style="margin-right: -5px; padding:2px 4px; border-radius:4px;">
                      0</p></i>
                 
                  </a> 
                </li>
                <li><a href="registration.html"><i class="fas fa-user"></i></a> </li>
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
            <li class="navlink mx-2"><a href="index.html" class="text-light">HOME</a></li>
            <li class="navlink dropdown dropdown-slide mx-2">
              <a href="#!" class="text-light" >PRODUCTS</a>
              <ul class="dropdown-menu">
                <li><a href="#!" class="pro">SHIRTS</a></li>
                <li><a href="product-list-initial/jackets.html" class="pro">JACKETS</a></li>
                <li><a href="#!" class="pro">TOTE BAGS</a></li>
                <li><a href="#!" class="pro">OTHERS</a></li>
              </ul>
            </li>
            <li class="navlink mx-2"><a href="about.html" class="text-light">ABOUT US</a></li>
            <li class="navlink mx-2"><a href="contact.html" class="text-light">CONTACT US</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!---- NAVBAR----->


    <!-- HOMEPAGE CONTENT-->
    <section>
      <div class="container-fluid backgrnd bg-illustration">
          <img class="back-img" src="assets/img/back.jpeg">
          <div class="col-md-4 centered"> 
            <h3 class="caption">Forever</h3>
            <h3 class="caption">true to the</h3>
            <h3 class="caption">Gold and Blue</h3>
        </div>
      </div>
    </section>


    <section class="product-category section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title text-center">
              <h2>Product Category</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="category-box">
              <a href="#!">
                <img src="assets/img/c1.png" alt="" />
                <div class="content">
                  <h3>Clothes</h3>
                  <p>Shop New Season Clothing</p>
                </div>
              </a>	
            </div>
            <div class="category-box">
              <a href="#!">
                <img src="assets/img/c2.png" alt="" />
                <div class="content">
                  <h3>Bags</h3>
                  <p>Get Wide Range Selection</p>
                </div>
              </a>	
            </div>
          </div>
          <div class="col-md-6">
            <div class="category-box category-box-2">
              <a href="#!">
                <img src="assets/img/c3.png" alt="" />
                <div class="content">
                  <h3>Jackets</h3>
                  <p>Limited Edition Designs</p>
                </div>
              </a>	
            </div>
          </div>
        </div>
      </div>
    </section>


<section class="products section bg-gray">
        <div class="container">
          <div class="row">
            <div class="title text-center">
              <h2>Popular Products</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="product-item">
                <div class="product-thumb">
                  <img class="img-responsive" src="assets/img/product/bag1.png" alt="product-img" />
                  <div class="preview-meta">
                    <ul>
                      <li>
                          <a href="#!" ><i class="fas fa-cart-plus"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="product-content">
                  <h4><a href="product-single.html">Product Name</a></h4>
                  <p class="price">Php 300.00</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="product-item">
                <div class="product-thumb">
                  <img class="img-responsive" src="assets/img/product/bag1.png" alt="product-img" />
                  <div class="preview-meta">
                    <ul>
                      <li>
                          <a href="#!" ><i class="fas fa-cart-plus"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="product-content">
                  <h4><a href="product-single.html">Product Name</a></h4>
                  <p class="price">Php 300.00</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="product-item">
                <div class="product-thumb">
                  <img class="img-responsive" src="assets/img/product/bag1.png" alt="product-img" />
                  <div class="preview-meta">
                    <ul>
                      <li>
                          <a href="#!" ><i class="fas fa-cart-plus"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="product-content">
                  <h4><a href="product-single.html">Product Name</a></h4>
                  <p class="price">Php 300.00</p>
                </div>
              </div>
            </div>
      
          </div>
        </div>
      </section>




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
    <script src="assets/js/jquery-3.6.1.js"></script>
  </body>


</html>