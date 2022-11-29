<?php 
include('config/authentication.php');
include('config/authcode.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Blue Thunder</title>
        <!-- ALERTIFY CSS  -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

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
                            <div class="sb-sidenav-menu-heading bg_dblue">MANAGE</div>
                            <a class="nav-link" href="users.php">
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-users" ></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="product/productlist.php">
                                <div class="sb-nav-link-icon fs-5"><i class="fas fa-table"></i></div>
                                Products
                            </a>
                            <a class="nav-link" href="orders/order.php" >
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
            <div class="page-wrapper pt-4">
            <div class="container-fluid">
                <div class="row">
                <!--USER ACCOUNT SIDEBAR -->
                <div class="col-md-12">
                    <div class="container-fluid pb-4">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h5 class="card-title">Account Information</h5>
                        </div>

                        <form action="config/product-function.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="container-fluid">
                            <?php
                            if(isset($_SESSION['admin'])){
                            $user = $_SESSION['admin'];
                            $getUserData = getUser('user_table',$user);
                            if(mysqli_num_rows($getUserData) > 0){
                            foreach($getUserData as $UserData){  ?> 

                                <div id="list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col text-center">
                                    <img class="img-fluid img-thumbnail client-img" src="images/user-image/<?=$UserData['image']?>" alt=""> 
                                    <h6 class="my-2"><?=$UserData['username']?></65>
                                    <input type="hidden" name = "id" value ="<?=$UserData['id']?>">
                                    </div>
                                </div>
                                <div class="my-2 input-group-sm">
                                    <i style="font-size: 13px;">Select an image to chage your profile</i>
                                    <input class="form-control" type="file" id="image" name="image" accept=".jpeg, .jpg, .png">
                                </div>
                                    <div class="row">
                                        <div class="col"><h6 class="my-2">Lastname</h6></div>
                                        <div class="col"><h6 class="my-2">Firstname</h6></div>
                                    </div>
                                    <div class="row">
                                        <div class="col input-group-sm"> 
                                            <input type="text" class="form-control" name="lastname" value="<?=$UserData['lastname']?>"> 
                                        </div>
                                        <div class="col input-group-sm"> 
                                            <input type="text" class="form-control" name="firstname" value="<?=$UserData['firstname']?>"> 
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col"><h6 class="my-2">Email</h6></div>
                                    <div class="col"><h6 class="my-2">Contact #</h6></div>
                                    <div class="col"><h6 class="my-2">Password</h6></div>
                                    </div>
                                    <div class="row">
                                    <div class="col input-group-sm"> 
                                        <input type="text" class="form-control" name="email" value="<?=$UserData['email']?>"> 
                                    </div>
                                    <div class="col input-group-sm"> 
                                        <input type="text" class="form-control" name="contact" value="<?=$UserData['phone']?>"> 
                                    </div>
                                    <div class="col input-group-sm"> 
                                        <input type="password" class="form-control " name="password">
                                        <label for="" style="font-size: 13px;"><i>Leave this blank if you dont want to change your password.</i> </label> 
                                    </div>
                                    <h6 class="my-2">Address</h6>
                                    <div class="col input-group-sm"> 
                                    <textarea class="form-control" aria-label="With textarea" name = "address"><?=$UserData['address']?></textarea>
                                    </div>
                                    </div>

                                </div>

                                <?php }}} ?>

                            </div>
                            
                    
                        </div>
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm me-3" name="update-account">Update</button>
                        <a href="account.php"><button type="button" class="btn btn-outline-secondary btn-sm " name="cancel-prod-btn">Cancel</button></a>
                        
                    </div>
                        </form>
                        </div>
                    </div>
                        
                </div>

                    

                    
                </div>
                </div>
            
            </div>
            </div>
            <!-- END_PAGE CONTENT -->

        </div>

        <!-- LIBRARIES -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
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
