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
        <link href="assets/css/Bootstrap.css" rel="stylesheet" />
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
                <main>
                    <div class="container-fluid px-3">
                        <h2 class="my-4">Dashboard</h2>
                        <!-- STATS -->
                        <div class="row ">
                    <?php
                    $getStock = "SELECT * FROM product_table";
                    $getStock_run = mysqli_query($con,$getStock);
                    $stock= 0;
                    $totalRev = 0;
                    while ($num = mysqli_fetch_assoc ($getStock_run)) {
                        $stock += $num['num_stock'];
                        $sold = $num['sold'];
                        $price = $num['price'];
                        $totalRev += $sold * $price;
                    }
                    $totalorders = 0;
                    $getTransaction = "SELECT * FROM transaction_table";
                    $getTransaction_run = mysqli_query($con,$getTransaction);
                    while ($trData = mysqli_fetch_assoc ($getTransaction_run)) {
                        $stat = $trData['status'];
                        $orderID = $trData['order_id'];
                        if($stat == "Pending"){
                            $getOrders = "SELECT * FROM order_table WHERE order_id = '$orderID' ";
                            $getOrders_run = mysqli_query($con,$getOrders);
                            while($orData = mysqli_fetch_assoc ($getOrders_run)){
                                $totalorders += $orData['quantity'];
                            }
                        }
                    }
                    $getUsers = "SELECT * FROM user_table";
                    $getUsers_run = mysqli_query($con,$getUsers);
                    $totaluser = 0;
                    while ($user = mysqli_fetch_assoc ($getUsers_run)) {
                        $totaluser += 1;
                    }
                    
                    ?>

                        <div class="col-xl-3 col-md-6">
                                <div class="card bg_lyellow text-dark mb-4">
                                    <div class="card-body">
                                        <h5>Total Stocks</h5>
                                        <div class="fs-5" align="center"><?= $stock ?></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-6">
                                <div class="card bg_lyellow text-dark mb-4">
                                    <div class="card-body">
                                        <h5>Pending Orders</h5>
                                        <div class="fs-5" align="center" ><?= $totalorders ?> items </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-6">
                                <div class="card bg_lyellow text-dark mb-4">
                                    <div class="card-body">
                                        <h5>Registered Users</h5>
                                        <div class="fs-5" align="center"><?= $totaluser ?> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg_lyellow text-dark mb-4">
                                    <div class="card-body">
                                        <h5>Store Revenue</h5>
                                        <div class="fs-5" align="center">Php <span><?=$totalRev?> </span></div>
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
                                        Product Sales by Category
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
        <script src="assets/js/scripts.js"></script>
        <script>
            
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        // Bar Chart Example
        var ctx = document.getElementById("myBarChart");
        var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
            <?php
                $shirtsales = 0;
                $jacketsales = 0;
                $bagsales = 0;
                $getsales = "SELECT * FROM product_table";
                $getStock_run = mysqli_query($con,$getsales);
                while ($sale = mysqli_fetch_assoc ($getStock_run)) {
                    $sold = $sale['sold'];
                    $price = $sale['price'];
                    $category = $sale['category'];

                    if($category == "Shirt"){
                        $shirtsales += $sold * $price;
                    } else if ($category == "Jacket") {
                        $jacketsales += $sold * $price;
                    } else if ($category == "Bag") {
                        $bagsales += $sold * $price;
                    }
                }
                ?>


            labels: ["Shirts", "Jackets", "Bags"],
            
            datasets: [{
            label: "Revenue",
            backgroundColor: ["rgb(4, 140, 74)" ,"rgb(4, 58, 140)","rgb(194, 77, 4)"],
            borderColor: "rgba(2,117,216,1)",
            data: [<?=$shirtsales?>, <?=$jacketsales?>, <?=$bagsales?>],
            }],



        },
        options: {
            scales: {
            xAxes: [{
                time: {
                unit: ''
                },
                gridLines: {
                display: false
                },
                ticks: {
                maxTicksLimit: 6
                }
            }],
            yAxes: [{
                ticks: {
                min: 0,
                max: 2000,
                maxTicksLimit: 5
                },
                gridLines: {
                display: true
                }
            }],
            },
            legend: {
            display: false
            }
        }
        });

        </script>
    </body>
</html>
