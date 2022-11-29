<?php 

include('../config/authentication.php');
include('../config/authcode.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Blue Thunder</title>
        <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />

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
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown"><i class="fas fa-user fa-fw fs-5"></i> 
                    <?php echo $_SESSION['admin']; ?> 
                    </a>
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
                            <h3 class="card-title">Product List</h3>
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
                                                    <a href="add-prod.php">
                                                        <button type="button" class="btn btn-success float-end">+ New Product</button>
                                                    </a>
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
                                                        <th class="text-center py-1 px-2" style="width: 5%;">Product ID </th>
                                                        <th class="py-1 px-2" style="width: 10%;">Product Name</th>
                                                        <th class="py-1 px-2" style="width: 5%;">Category</th>
                                                        <th class="py-1 px-2" style="width: 20%;">Description</th>
                                                        <th class="py-1 px-2" style="width: 5%;">Price</th>
                                                        <th class="py-1 px-2" style="width: 5%;"># Stock</th>
                                                        <th class="py-1 px-2" style="width: 5%;">Sold</th>
                                                        <th class="py-1 px-2 text-center" style="width: 5%;">Edit/Delete</th>
                                                    </tr>
                                                </thead>
                                                <!-- END_COLUMN TITLES-->


                                                <!-- USERS RECORD-->
                                                <tbody>
                                                    <?php 
                                                    $product = getALL("product_table");
                                                    if(mysqli_num_rows($product) > 0){
                                                        foreach($product as $item){ 
                                                            ?>
                                                            <tr class="odd">
                                                            <td class="text-center py-3 px-2"><?= $item['product_id']?></td>
                                                            <td class="py-3 px-2 data"><?= $item['product_name']?></td>
                                                            <td class="py-3 px-2"><?= $item['category']?></td>
                                                            <td class="py-3 px-2"><?= $item['description']?></td>
                                                            <td class="py-3 px-2"><?= $item['price']?></td>
                                                            <td class="py-3 px-2"><?= $item['num_stock']?></td>
                                                            <td class="py-3 px-2"><?= $item['sold']?></td>
                                                            <td class="" align="center" >
                                                            <a class="nav-link dropdown-toggle " id="navbarDropdown action-b" href="#" role="button" data-bs-toggle="dropdown"> Action </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item text-center" href="edit-prod.php?product_id=<?= $item['product_id'];?>"> <span class="fa fa-edit text-primary"></span> Edit</a></li>
                                                                    <li><hr class="dropdown-divider" /></li>
                                                                    <form action="../config/product-function.php" method="post">
                                                                    <input type="hidden" name="prod-delID" value="<?= $item['product_id']?>">
                                                                    <li><button class="dropdown-item text-center" tpye="submit" name="del-prod-btn" >
                                                                        <a class="dropdown-item"><span class="fa fa-trash text-danger"></span> Delete</a></button>
                                                                    </li>
                                                                    </form>
                                                                </ul>
                                                            </td>    
                                                            </tr>  
                                                            
                                                            <?php 
                                                        }
                                                    } else {
                                                        echo "No records";
                                                    }
                                                    ?>
                                                
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
        <script src="../assets/js/scripts.js"></script>
        <!-- ALERTIFY JS -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script>
            <?php if(isset($_SESSION['edit_msg'])){  ?>
                alertify.set('notifier','position', 'top-right');
                alertify.success('<?= $_SESSION['edit_msg'];?>');  
            <?php unset($_SESSION['edit_msg']);   } ?>
        </script>
    </body>
</html>
