<?php 
include('config/authentication.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Blue Thunder</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="assets/css/Bootstrap.css" rel="stylesheet" />
        <link href="assets/css/dash.css" rel="stylesheet" />
        <link rel="icon" href="images/icon.png">
    </head>
    <body class="sb-nav-fixed">
        <!-- TOP NAVBAR -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bgblue">
            <a href="index.php"><img src="images/B_logo.png" class="mx-7" width="80px"></a>
            
            
                <button class=" btn btn-link btn-sm fs-4" id="sidebarToggle" align="right"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ms-auto ms-md-auto me-5 me-lg-4">
                <li class="nav-item dropdown d-md-inline-block ms-auto">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown"><i class="fas fa-user fa-fw fs-5"></i> 
                    <?php echo $_SESSION['admin']; ?> 
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="account.php">Account</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="config/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <!-- SIDE BAR -->
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <!-- SIDE MENU -->
                        <div class="nav mt-4">
                            
                            <div class="sb-sidenav-menu-heading bg_dblue">REPORTS</div>
                            <a class="nav-link" href="index.php" style="color: white;">
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-tachometer-alt" style="color: white;"></i></div>
                                Overview
                            </a>
                            <a class="nav-link" href="sales.html">
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-money-check-alt"></i></div>
                                Sales
                            </a>
                            <div class="sb-sidenav-menu-heading bg_dblue">MANAGE</div>
                            <a class="nav-link" href="users/users.php">
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-users" ></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="product/productlist.php">
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-table"></i></div>
                                Products
                            </a>
                            <a class="nav-link" href="orders/order.html" >
                                <div class="sb-nav-link-icon fs-6"><i class="fas fa-truck"></i></div>
                                Orders
                            </a>
                            <div class="sb-sidenav-menu-heading bg_dblue">OTHERS</div>

                        </div>
                        <!-- END_SIDE MENU -->
                    </div>
                </nav>
            </div>
            <!-- END_SIDE BAR -->

            <!-- PAGE CONTENT -->
            <div id="layoutSidenav_content">
                <main>
                  <section class="content  text-dark">
                    <div class="container-fluid">
                      <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Account</h3>
                        </div>

                        <form action="../config/product-function.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            
                            <div class="container-fluid">
                                <div id="list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                  <div class="row">
                                    <div class="col text-center">
                                      <img class="img-fluid img-thumbnail" src="images/icon.png" alt=""> 
                                      <h5 class="my-2">Username</h5>
                                    </div>
                                  </div>
                                  <div class="my-2">
                                    <i>Select an image</i>
                                    <input class="form-control" type="file" id="image" name="image" accept=".jpeg, .jpg, .png">
                                  </div>


                                    <div class="row">
                                        <div class="col"><h5 class="my-2">Lastname</h5></div>
                                        <div class="col"><h5 class="my-2">Firstname</h5></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"> 
                                            <input type="text" class="form-control" name="lastname"> 
                                        </div>
                                        <div class="col"> 
                                            <input type="text" class="form-control" name="firstname"> 
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col"><h5 class="my-2">Email</h5></div>
                                      <div class="col"><h5 class="my-2">Contact #</h5></div>
                                      <div class="col"><h5 class="my-2">Password</h5></div>
                                    </div>
                                    <div class="row">
                                      <div class="col"> 
                                          <input type="text" class="form-control" name="email"> 
                                      </div>
                                      <div class="col"> 
                                          <input type="text" class="form-control" name="contact"> 
                                      </div>
                                      <div class="col"> 
                                        <input type="password" class="form-control" name="password">
                                        <label for="" style="font-size: 12px;">Leave this blank if you dont want to change the password.</label> 
                                    </div>
                                    <h5 class="my-2">Address</h5>
                                    <div class="col"> 
                                    <textarea class="form-control" aria-label="With textarea">Address</textarea>
                                    </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer my-2">
                                <button type="submit" class="btn btn-primary me-3" name="add-prod-btn">Save</button>
                                <button type="button" class="btn btn-outline-secondary" name="cancel-prod-btn">Cancel</button>
                            </div>
                       
                        </div>
                        </form>
                        </div>
                    </div>
                </section>
                </main>
            </div>
            <!-- END_PAGE CONTENT -->

        </div>

        <!-- LIBRARIES -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/charts/chart-bar.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>
</html>
