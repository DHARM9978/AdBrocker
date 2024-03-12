
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../assets/js/pace.min.js"></script>

    <!--plugins-->
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">



    <!--Theme Styles-->
    <link href="../assets/css/dark-theme.css" rel="stylesheet" />
    <link href="../assets/css/semi-dark.css" rel="stylesheet" />
    <link href="../assets/css/header-colors.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <script src="../assets/js/font.min.js"></script>
    <!-- <link rel="stylesheet" href="../assets/css/dataTables.bootstrap5.min.css"> -->
    <!-- <script src="../assets/js/dataTables.bootstrap5.min.js"></script> -->
    <!-- <script src="../assets/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="../assets/js/bootstrap.bundle.min.js"></script> -->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/css/all.min.css">
    <script src="../assets/fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/js/all.min.js"></script>



    <style>
    a {
        text-decoration: none;
    }
    </style>

    <title>AdBrokers</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="../assets/images/logo-icon-2.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Adbrokers</h4>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="ab-dashboard.php">
                        <div class="parent-icon">
                            <i class="fa-solid fa-house"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="subscription.php">
                        <div class="parent-icon">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                        </div>
                        <div class="menu-title">Subscription</div>
                    </a>

                <li class="menu-label">Users</li>
                <li>
                    <a href="advertiser_details.php">
                        <div class="parent-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="menu-title">Advertiser</div>
                    </a>

                </li>

                <li>
                    <a href="publisher_details.php">
                        <div class="parent-icon">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="menu-title">Publisher</div>
                    </a>

                </li>
                <li>
                    <a href="admin_details.php">
                        <div class="parent-icon">
                            <!-- <ion-icon name="leaf-outline"></ion-icon> -->
                            <!-- <i class="fa-solid fa-user-tie"></i> -->
                            <i class="fa-solid fa-user-secret"></i>
                        </div>
                        <div class="menu-title">Admins</div>
                    </a>

                </li>
                <hr>
                <li class="menu-label">Advertiser</li>

                <li>
                    <a href="advertiser_all_orders.php">
                        <div class="parent-icon">
                            <ion-icon name="server-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Total Orders</div>
                    </a>

                </li>

                <li>
                    <a href="advertiser_Approved_orders.php">
                        <div class="parent-icon">
                            <ion-icon name="newspaper-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Approved Orders</div>
                    </a>

                </li>

                <li>
                    <a href="advertiser_history_order.php">
                        <div class="parent-icon">
                            <ion-icon name="newspaper-outline"></ion-icon>
                        </div>
                        <div class="menu-title">History Orders</div>
                    </a>

                </li>






                <li>
                    <a href="advertiser_pending_Orders.php">
                        <div class="parent-icon">
                            <ion-icon name="newspaper-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Pending Orders</div>
                    </a>

                </li>

                <hr>
                <li class="menu-label">Publisher</li>

                <li>
                    <a href="publisher_total_order.php">
                        <div class="parent-icon">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Total Orders</div>
                    </a>
                </li>

                <li>
                    <a href="publisher_approved_order.php">
                        <div class="parent-icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Approved Orders</div>
                    </a>

                </li>
                <li>
                    <a href="publisher_pending_order.php">
                        <div class="parent-icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Pending Orders</div>
                    </a>

                </li>


                </li>
                <hr>
                <!-- <li class="menu-label">Advertise</li>
        <li>
          <a href="ads_page.php">
            <div class="parent-icon">
              <ion-icon name="bar-chart-outline"></ion-icon>
            </div>
            <div class="menu-title">Total Ads</div>
          </a>

        </li> -->
                <!-- <li>
          <a href="#">
            <div class="parent-icon">
              <ion-icon name="map-outline"></ion-icon>
            </div>
            <div class="menu-title">Maps</div>
          </a>

        </li> -->
                <!-- <hr> -->
                <li class="menu-label">Profile</li>
                <li>
                    <a href="./Profile.php">
                        <div class="parent-icon">
                            <i class="fa-solid fa-id-badge"></i>
                        </div>
                        <div class="menu-title">Profile</div>
                    </a>

                </li>
                <li>
                    <a href="./change_password.php">
                        <div class="parent-icon">
                            <i class="fa-solid fa-unlock-keyhole"></i>
                        </div>
                        <div class="menu-title">Change Password</div>
                    </a>

                </li>
                <li>
                    <a href="../logout.php">
                        <div class="parent-icon">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </div>
                        <div class="menu-title">Log Out</div>
                    </a>
                </li>

            </ul>
            <!--end navigation-->
        </aside>
        <!--end sidebar -->

        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand gap-3">
                <div class="toggle-icon">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <form class="searchbar">
                    <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
                        <ion-icon name="search-outline"></ion-icon>
                    </div>
                    <input class="form-control" type="text" placeholder="Search for anything">
                    <div class="position-absolute top-50 translate-middle-y search-close-icon">
                        <ion-icon name="close-outline"></ion-icon>
                    </div>
                </form>
                <div class="top-navbar-right ms-auto">

                    <ul class="navbar-nav align-items-center">

                        <li class="nav-item">
                            <a class="nav-link dark-mode-icon" href="javascript:;">
                                <div class="mode-icon">

                                    <ion-icon name="moon-outline"></ion-icon>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-user-setting">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                data-bs-toggle="dropdown">
                                <div class="user-setting">
                                    <img src="../ProfileImages/<?php echo $result1['adm_image']?>" class="user-img"
                                        alt="">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex flex-row align-items-center gap-2">
                                            <img src="../ProfileImages/<?php echo $result1['adm_image']?>" alt=""
                                                class="rounded-circle" width="54" height="54">
                                            <div class="">
                                                <h6 class="mb-0 dropdown-user-name">
                                                    <?php echo ucwords($_SESSION['admin_name']) ?></h6>

                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="Profile.php">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <ion-icon name="person-outline"></ion-icon>
                                            </div>
                                            <div class="ms-3"><span>Profile</span></div>
                                        </div>
                                    </a>
                                </li>
                                <!-- <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="settings-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Setting</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="speedometer-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Dashboard</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="wallet-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Earnings</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="cloud-download-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Downloads</span></div>
                    </div>
                  </a>
                </li> -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../logout.php">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <ion-icon name="log-out-outline"></ion-icon>
                                            </div>
                                            <div class="ms-3"><span>Logout</span></div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>


                    </ul>

                </div>
            </nav>
        </header>
        <!--end top header-->

        <!-- JS Files-->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <!--plugins-->
        <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <script src="../assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
        <script src="../assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
        <script src="../assets/plugins/chartjs/chart.min.js"></script>
        <script src="../assets/js/index.js"></script>
        <!-- Main JS-->
        <script src="../assets/js/main.js"></script>