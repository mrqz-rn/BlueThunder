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
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw fs-5"></i> username </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Account</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
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
                            <a class="nav-link" href="../sales.html" >
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-money-check-alt"></i></div>
                                Sales
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
                            <a class="nav-link" href="../orders/order.html" >
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
                            <h3 class="card-title">Edit Product</h3>
                        </div>

                        <form action="../config/product-function.php" method="post" enctype="multipart/form-data">
                        <?php 
                        if(isset($_GET['product_id'])){
                            $productID = $_GET['product_id'];
                            $edit_prod = getProductID("product_table", $productID);
                            $productDATA;
                            if(mysqli_num_rows($edit_prod) > 0){
                                $productDATA = mysqli_fetch_array($edit_prod);
                            }
                            
                        ?>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div id="list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <h5 class="my-2">Product Name</h5>
                                    <input type="hidden" name="prodID" value="<?= $productDATA['product_id'] ?>">
                                    <input type="text" class="form-control" name="productname" value="<?= $productDATA['product_name'] ?>">
                                    
                                    <div class="row">
                                        <div class="col"><h5 class="my-2">Category</h5></div>
                                        <div class="col"><h5 class="my-2">Price</h5></div>
                                        <div class="col"><h5 class="my-2"># Stock</h5></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                           <?php 
                                            $cat1 = "";
                                            $cat2 = "";
                                            $cat3 = "";
                                            $cat4 = "";
                                            $cat5 = "";

                                            if($productDATA['category'] == 'Shirt'){
                                                $cat1 = "selected";
                                            } elseif ($productDATA['category'] == 'Jacket'){
                                                $cat2 = "selected";
                                            } elseif ($productDATA['category'] == 'Bag'){
                                                $cat3 = "selected";
                                            } elseif ($productDATA['category'] == 'Lace'){
                                                $cat4 = "selected";
                                            } else {
                                                $cat5 = "selected";
                                            }
                                           ?> 
                                        
                                            <select class="form-select" name="category" value="<?= $productDATA['category'] ?>">
                                                <option >Select</option>
                                                <option <?= $cat1 ?> value="Shirt">Shirt</option>
                                                <option <?= $cat2 ?> value="Jacket">Jacket</option>
                                                <option <?= $cat3 ?> value="Bag">Bag</option>
                                                <option <?= $cat4 ?> value="Lace">Lace</option>
                                                <option <?= $cat5 ?> value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="col input-group"> 
                                            <span class="input-group-text">₱</span>
                                            <input type="text" class="form-control" name="price" value="<?= $productDATA['price'] ?>"> 
                                        </div>
                                        <div class="col"> 
                                            <input type="text" class="form-control" name="stock" value="<?= $productDATA['num_stock'] ?>"> 
                                        </div>
                                    </div>

                                    <h5 class="my-2">Description</h5>
                                    <div class="form-floating">
                                        <textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="description" ><?=$productDATA['description']?></textarea>
                                        <label for="floatingTextarea2"></label>
                                    </div>
                                    <h5 class="my-2">Status</h5>
                                    <select class="form-select my-2" name ="status">
                                        <?php 
                                        $act = "";
                                        $inact = "";
                                        if($productDATA['status'] == 'Active'){
                                            $act = "selected";
                                        } else {
                                            $inact = "selected";
                                        }
                                        
                                        ?>
                                        <option >Select</option>
                                        <option <?= $act ?> value="Active">Active</option>
                                        <option <?= $inact ?> value="Inactive">Inactive</option>
                                    </select>
                                    <h5 class="my-2">Image</h5>
                                    <div class="mb-3">
                                        <label for="">Current Image</label>
                                        <input type="hidden" name = "old_image" value="<?=$productDATA['image']?>">
                                        <img class="m-2" src="../images/product-image/<?=$productDATA['image']?>" alt="" width="75px">
                                        <input class="form-control" type="file" id="image" name="image" accept=".jpeg, .jpg, .png">
                                      </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary me-3" name="edit-prod-btn">Update</button>
                                <button type="button" class="btn btn-outline-secondary" name="cancel-prod-btn">Cancel</button>
                            </div>
                        
                        </div>
                        <?php
                            } ?> 
                        </form>
                        </div>
                        
                    </div>
                </section>
            </div>
            <!-- END_PAGE CONTENT -->

        </div>

        
        <!-- SCRIPTS -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/js/scripts.js"></script>

        <!-- ALERTIFY JS -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script>
            <?php if(isset($_SESSION['edit_msg'])){  ?>
                alertify.set('notifier','position', 'top-right');
                alertify.success('<?= $_SESSION['add_msg'];?>');  
            <?php unset($_SESSION['edit_msg']);   } ?>
        </script>
    </body>
</html>
