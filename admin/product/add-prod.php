<?php

include('../config/authentication.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Blue Thunder</title>
        <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
        <!-- ALERTIFY CSS  -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

        <link href="../assets/css/Bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/css/dash.css"> 
        <link rel="icon" href="../images/icon.png">         
    </head>
    <body class="sb-nav-fixed">
        <!-- TOP NAVBAR -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bgblue">
            <img src="../images/B_logo.png" class="mx-7" width="80px">
            
                <button class=" btn btn-link btn-sm fs-4" id="sidebarToggle" align="right"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ms-auto ms-md-auto me-5 me-lg-4">
                <li class="nav-item dropdown d-md-inline-block ms-auto">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw fs-5"></i> username </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../account.php">Account</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../config/logout.php">Logout</a></li>
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
                            <a class="nav-link" href="../index.php" >
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-tachometer-alt" ></i></div>
                                Overview
                            </a>
                            <div class="sb-sidenav-menu-heading bg_dblue">MANAGE</div>
                            <a class="nav-link" href="../users.php" >
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-users"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="productlist.php" style="color: white;">
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-table" style="color: white;"></i></div>
                                Products
                            </a>
                            <a class="nav-link" href="../orders/order.php" >
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
                            <h3 class="card-title">Add Product</h3>
                        </div>

                        <form action="../config/product-function.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            
                            <div class="container-fluid">
                                <div id="list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <h5 class="my-2">Product Name</h5>
                                    <input type="text" class="form-control" name="productname">
                                    
                                    <div class="row">
                                        <div class="col"><h5 class="my-2">Category</h5></div>
                                        <div class="col"><h5 class="my-2">Price</h5></div>
                                        <div class="col"><h5 class="my-2"># Stock</h5></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"> 
                                            <select class="form-select" name="category">
                                                <option selected>Select</option>
                                                <option value="Shirt">Shirt</option>
                                                <option value="Jacket">Jacket</option>
                                                <option value="Bag">Bag</option>
                                                <option value="Lace">Lace</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="col input-group"> 
                                            <span class="input-group-text">₱</span>
                                            <input type="text" class="form-control" name="price"> 
                                        </div>
                                        <div class="col"> 
                                            <input type="text" class="form-control" name="stock"> 
                                        </div>
                                    </div>

                                    <h5 class="my-2">Description</h5>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
                                        <label for="floatingTextarea2"></label>
                                    </div>
                                    <h5 class="my-2">Status</h5>
                                    <select class="form-select my-2" name ="status">
                                        <option selected>Select</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    <h5 class="my-2">Image</h5>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Filename: .jpeg, .jpg, .png</label>
                                        <input class="form-control" type="file" id="image" name="image" accept=".jpeg, .jpg, .png">
                                      </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary me-3" name="add-prod-btn">Save</button>
                                <button type="button" class="btn btn-outline-secondary" name="cancel-prod-btn">Cancel</button>
                            </div>
                       
                        </div>
                        </form>
                        </div>
                    </div>
                </section>
            </div>
            <!-- END_PAGE CONTENT -->

        </div>

        
        <!-- LIBRARIES -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../assets/js/scripts.js"></script>
        
        <!-- ALERTIFY JS -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script>
            <?php if(isset($_SESSION['add_msg'])){  ?>
                alertify.set('notifier','position', 'top-right');
                alertify.success('<?= $_SESSION['add_msg'];?>');  
            <?php unset($_SESSION['add_msg']);   } ?>
        </script>


    </body>
</html>
