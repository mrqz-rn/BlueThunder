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
        <link href="../assets/css/Bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/css/dash.css">    
        <link rel="icon" href="icon">    
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
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-users" ></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="../product/productlist.php">
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-table"></i></div>
                                Products
                            </a>
                            <a class="nav-link" href="order.php" style="color: white;">
                                <div class="sb-nav-link-icon fs-6"><i class="fas fa-truck" style="color: white;"></i></div>
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
                            <h3 class="card-title">Order</h3>
                        </div>

                       
                        <?php 
                        if(isset($_GET['transaction_code'])){
                            $tr_code = $_GET['transaction_code'];
                            $getTR = getTransaction($tr_code);
                            $tr_data;
                            if(mysqli_num_rows($getTR) > 0){
                                $tr_data = mysqli_fetch_array($getTR);
                            } ?>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div id="list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    
                                  
                                    <div class="col-6" id="ordata">
                                        <div class="" id="ordata">
                                            <h6 class="my-2">Order # :  
                                                <span style="font-weight: 200;"><?=$tr_data['transaction_code']?></span>
                                            </h6>
                                            <?php 
                                            $username = getByUserID($tr_data['customer_id']);
                                            if(mysqli_num_rows($username) > 0){
                                                $customer = mysqli_fetch_array($username);
                                            ?>
                                            <h6 class="my-2">Customer :  
                                                <span style="font-weight: 200;"><?=$customer['firstname']?>  <?=$customer['lastname']?></span>
                                            </h6>
                                            <?php
                                                }
                                            ?>
                                            <h6 class="my-2">Delivery Address :  
                                                <span style="font-weight: 200;"><?=$tr_data['delivery_address']?></span>
                                            </h6>
                                            <h6 class="my-2">Payment Method :  
                                                <span style="font-weight: 200;"><?=$tr_data['payment']?></span>
                                            </h6>
                                            <h6 class="my-2">Courier:  
                                                <span style="font-weight: 200;"><?=$tr_data['courier']?></span>
                                            </h6>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <div class="">
                                                    <h6 class="search-label">Order Status :
                                                        <span class="<?=$tr_data['status']?>"><?=$tr_data['status']?></span>
                                                    </h6>
                                                    <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#stat-modal">
                                                        Update Status
                                                    </button>
                                                    <div class="modal fade" id="stat-modal" data-bs-backdrop="static"  >
                                                    
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                        <form action="../config/product-function.php" method="post">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">ORDER STATUS</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <?php
                                                        $stat1 = "";
                                                        $stat2 = "";
                                                        $stat3 = "";
                                                        $stat4 = "";
                                                        if($tr_data['status'] == 'Pending'){
                                                            $stat1 = "selected";
                                                        } elseif ($tr_data['status'] == 'Packed'){
                                                            $stat2 = "selected";
                                                        } elseif ($tr_data['status'] == 'Out-for-Delivery'){
                                                            $stat3 = "selected";
                                                        } elseif ($tr_data['status'] == 'Delivered'){
                                                            $stat4 = "selected";
                                                        } ?>
                                                        <h6>Update Status: </h6>
                                                        <select class="form-select" name="or_status" value="<?= $tr_data['status'] ?>">
                                                            <option <?= $stat1?> value="Pending">Pending</option>
                                                            <option <?= $stat2?> value="Packed">Packed</option>
                                                            <option <?= $stat3?>  value="Out-for-Delivery">Out for Delivery</option>
                                                            <option <?= $stat4?>  value="Delivered">Delivered</option>
                                                        </select>
                                                        </div>
                                                            
                                                        <div class="modal-footer">
                                                        
                                                            <input type="hidden" name = "transac_id" value="<?=$tr_data['transaction_code']?>">
                                                            <button type="submit" class="btn btn-primary" name = "updateORDER" value= "update">Update</button>
                                                            <button type="button" class="btn  btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        
                                                        </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row card mt-4">
                                        <div class="col-sm-12">
                                            <table class="table table-hover table-striped dataTable no-footer" >
                                            <!-- COLUMN TITLES-->
                                                <thead>
                                                    <tr role="row">
                                                        <th class="py-1 px-2" style="width: 20%;">Product</th>
                                                        <th class="py-1 px-2 text-center" style="width: 15%;">Qty</th>
                                                        <th class="py-1 px-2 text-center" style="width: 15%;">Price</th>
                                                        <th class="py-1 px-2 text-center" style="width: 10%;">Sub Total</th>
                                                    </tr>
                                                </thead>
                                                <!-- END_COLUMN TITLES-->

                                                <!-- USERS RECORD-->
                                                <tbody>
                                                    <?php
                                                    $displayORDER = getOrders($tr_data['order_id']);
                                                    if(mysqli_num_rows($displayORDER) > 0){
                                                      foreach($displayORDER as $or_data){
                                                        
                                                    ?>
                                                    <tr class="odd">
                                                        <?php
                                                        $getP = getProductID('product_table',$or_data['product_id']);
                                                        if(mysqli_num_rows($getP) > 0){
                                                            $product = mysqli_fetch_array($getP); ?>
                                                        <td class="py-2 px-2 "><?=$product['product_name']?></td>
                                                        <?php } ?>

                                                        <td class="py-2 px-2 text-center"><?=$or_data['quantity']?></td>
                                                        <td class="py-2 px-2 text-center"><?=$or_data['price']?></td>
                                                        <td class="py-2 px-2 text-center"><?=$or_data['subtotal']?></td>

                                                    </tr>  
                                                     <?php
                                                      }}
                                                     ?>
                                                </tbody>
                                                <!-- END_USERS RECORD-->
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="3" class="font-weight-bold text-end px-1 py-2 align-middle">GRAND TOTAL : </th>
                                                        <th class="text-center font-weight-bold px-1 py-2 align-middle"><?=$tr_data['total']?></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>   
                        <?php } ?>   
        

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

    </body>
</html>
