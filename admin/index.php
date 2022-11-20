<?php 
session_start();

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
        <link rel="icon" href="images/icon.png">
    </head>
    <body class="sb-nav-fixed">
        <!-- TOP NAVBAR -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bgblue">
            <img src="images/B_logo.png" class="mx-7" width="80px">
            
                <button class=" btn btn-link btn-sm fs-4" id="sidebarToggle" align="right"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ms-auto ms-md-auto me-5 me-lg-4">
                <li class="nav-item dropdown d-md-inline-block ms-auto">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown"><i class="fas fa-user fa-fw fs-5"></i> 
                    <?php echo $_SESSION['admin']; ?> 
                    </a>


                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Account</a></li>
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
                            <a class="nav-link" href="users.html">
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-users" ></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="product/productlist.html">
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-table"></i></div>
                                Products
                            </a>
                            <a class="nav-link" href="order.html" >
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
                    <div class="container-fluid px-3">
                        <h2 class="my-4">Dashboard</h2>
                        <!-- STATS -->
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg_lyellow text-dark mb-4">
                                    <div class="card-body">
                                        <h5>TOTAL REVENUE</h5>
                                        <div class="m-2 fs-4" align="center">184,500</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg_lyellow text-dark mb-4">
                                    <div class="card-body">
                                        <h5>TOTAL REVENUE</h5>
                                        <div class="m-2 fs-4" align="center">184,500</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg_lyellow text-dark mb-4">
                                    <div class="card-body">
                                        <h5>TOTAL REVENUE</h5>
                                        <div class="m-2 fs-4" align="center">184,500</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg_lyellow text-dark mb-4">
                                    <div class="card-body">
                                        <h5>TOTAL REVENUE</h5>
                                        <div class="m-2 fs-4" align="center">184,500</div>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                        <!-- END_STATS -->

                        <!--BAR CHART-->
                        <div class="row ">
                            <div class="col-xl-10 container-fluid">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <!--END_BAR CHART-->

                    </div>
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
