<?php
include('../config/user-function.php');

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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../assets/img/icon.png">
</head>


<body>
    <!---- HEADER----->
    <div class="navbar navbar-light" style="background-color: #FFD700;">
      <div class="container">
          
        <div class="col-md-4 col-xs-12 col-sm-4"> 
          <img src="../assets/img/B_logo.png"  width=90px" height="85px">
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
                <li><a href="../productlist.php?category=All" class="pro">ALL</a></li>
                <li><a href="../productlist.php?category=Shirt" class="pro">SHIRTS</a></li>
                <li><a href="../productlist.php?category=Jacket" class="pro">JACKETS</a></li>
                <li><a href="../productlist.php?category=Bag" class="pro">TOTE BAGS</a></li>
                <li><a href="../productlist.php?category=Other" class="pro">OTHERS</a></li>
              </ul>
            </li>
            <li class="navlink mx-2"><a href="../about.php" class="text-light">ABOUT US</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!---- NAVBAR----->


    <!--  CONTENT-->
    <div class="page-wrapper py-4">
      
        <div class="container">
          <div class="row">
            <div class="col-md-2">
				<nav>
                    <h5 class="text-center">MY ACCOUNT</h5>
                    <hr class="divider">
                    <div class="py-1 text-center "><a href="account.php"><label for="">Personal Information</label></a></div>
                    <div class="py-1 text-center bg-gray"><a href="ordertrack.php"><label for="">Order & Tracking</label></a></div>
                </nav>
			</div>
            <div class="col-md-10">
                <div class="card">
                    <div class="container-fluid">
                        <div id="list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            
             
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="pt-2">Orders</h5>
                                    <hr class="divider">
                                    <table class="table table-hover table-striped dataTable no-footer" >
                                    <!-- COLUMN TITLES-->
                                        <thead>
                                            <tr role="row">
                                                
                                                <th class="py-1 px-2 text-center" style="width: 5%;">#</th>
                                                <th class="py-1 px-2 text-center" style="width: 15%;">Date/Time</th>
                                                <th class="py-1 px-2 text-center" style="width: 25%;">Order #</th>
                                                <th class="py-1 px-2 text-center" style="width: 15%;">Total Amount</th>
                                                <th class="py-1 px-2 text-center" style="width: 20%;">Order Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <!-- END_COLUMN TITLES-->

                                        <!-- USERS RECORD-->
                                        <tbody>
                                            <tr class="odd">
                                                
                                                <td class="py-2 px-2 ">Product Name</td>
                                                <td class="py-2 px-2 text-center">L</td>
                                                <td class="py-2 px-2 text-center">2</td>
                                                <td class="py-2 px-2 text-center">200</td>
                                                <td class="py-2 px-2 text-center">400</td>
                                                
                                                
                                                
                                            </tr>  
                                             
                                        </tbody>
                                        <!-- END_USERS RECORD-->
                                        
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>

              

            
          </div>
        </div>
      
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
  </body>


</html>