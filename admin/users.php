<?php 
include('config/authcode.php');
include('config/authentication.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Blue Thunder</title>
        <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="assets/css/Bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/dash.css">     
        <link rel="icon" href="images/icon.png">    
    </head>
    <body class="sb-nav-fixed">
        <!-- TOP NAVBAR -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bgblue">
            <img src="images/B_logo.png" class="mx-7" width="80px">
            
                <button class=" btn btn-link btn-sm fs-4" id="sidebarToggle" align="right"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ms-auto ms-md-auto me-5 me-lg-4">
                <li class="nav-item dropdown d-md-inline-block ms-auto">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw fs-5"></i> username </a>
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
                            <a class="nav-link" href="index.php" >
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-tachometer-alt" ></i></div>
                                Overview
                            </a>
                            <div class="sb-sidenav-menu-heading bg_dblue">MANAGE</div>
                            <a class="nav-link" href="users.php" style="color: white;">
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-users" style="color: white;"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="product/productlist.php">
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-table"></i></div>
                                Products
                            </a>
                            <a class="nav-link" href="order.php" >
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
                <section class="content  text-dark">
                    <div class="container-fluid">
                      <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">List of Clients</h3>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div id="list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <!--SEARCH TOOL-->
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="">
                                                <label class="search-label">Search:</label>
                                                <input class="search-tool form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <!--END_SEARCH TOOL-->

                                    <!-- DATATABLE CONTENT-->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-hover table-striped dataTable no-footer" >
                                            <!-- COLUMN TITLES-->
                                                <thead>
                                                    <tr role="row">
                                                        <th class="text-center py-1 px-2" style="width: 5%;">ID</th>
                                                        <th class="py-1 px-2" style="width: 10%;">Lastname</th>
                                                        <th class="py-1 px-2" style="width: 10%;">Firstname</th>
                                                        <th class="py-1 px-2" style="width: 10%;">Username</th>
                                                        <th class="py-1 px-2" style="width: 15%;">Email</th>
                                                        <th class="py-1 px-2" style="width: 5%;">Role</th>
                                                    </tr>
                                                </thead>
                                                <!-- END_COLUMN TITLES-->

                                                <!-- USERS RECORD-->
                                                <tbody>
                                                <?php 
                                                    $client = getALL("user_table");
                                                    if(mysqli_num_rows($client) > 0){
                                                        foreach($client as $c_item){ 
                                                            ?>

                                                    <tr class="odd">
                                                        <td class="text-center py-3 px-2"><?= $c_item['id']?></td>
                                                        <td class="py-3 px-2 data"><?= $c_item['lastname']?></td>
                                                        <td class="py-3 px-2"><?= $c_item['firstname']?></td>
                                                        <td class="py-3 px-2"><?= $c_item['username']?></td>
                                                        <td class="py-3 px-2"><?= $c_item['email']?></td>
                                                            <?php 
                                                            $role;
                                                                if($c_item['role'] == 1){
                                                                    $role = "Admin";
                                                                } else {
                                                                    $role = "Customer";
                                                                }
                                                            ?>

                                                        <td class="py-3 px-2"><?= $role ?></td>
                                                    </tr>  
                                                    <?php 
                                                        }
                                                    } else {
                                                        echo "No records";
                                                    }
                                                    ?>

                                                    
                                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmation</h1>
                                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure to delete this user permanently?
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                              <button type="button" class="btn btn-primary">Continue</button>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div> 
                                                </tbody>
                                                <!-- END_USERS RECORD-->
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END_DATATABLE CONTENT-->

                                    <div class="row">
                                        <div class="col-sm-12 col-md-7 mt-3">
                                            <div class="" id="list_paginate">
                                                <ul class="pagination">
                                                    <li style="width: 100px; text-align:center;">
                                                        <a href="#" class="page-link">Previous</a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#" class="page-link">1</a>
                                                    </li>
                                                    <li style="width: 100px; text-align:center;">
                                                        <a href="#" class="page-link">Next</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </section>
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
