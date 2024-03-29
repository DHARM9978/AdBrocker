<?php

if ($_SESSION["is_loggedin"] == false) {
  header("Location:/AdBroker_AdminPanel/admin-login.php");
}

require './base.php';
require '../Modules/AdminAPI.php';
require '../Modules/AdvertiserAPI.php';
require '../Modules/PublisherAPI.php';
require "../Modules/AdvertiseAPI.php";





$AdminData=totalAdminAPI("https://admanager-s9eo.onrender.com/user");
$TotalAdmin= count($AdminData);

$AdvertiserData=totalAdvertiserAPI("https://admanager-s9eo.onrender.com/fire/advertisers");
$TotalAdvertiser=count($AdvertiserData);

$PublisherData=totalPublisherAPI("https://admanager-s9eo.onrender.com/fire/publishers");
$TotalPublisher=count($PublisherData);

$AdData=totalAdvertiseAPI("https://admanager-s9eo.onrender.com/advertise");
$TotalAd=count($AdData);



$Data=totalAdminAPI("https://admanager-s9eo.onrender.com/transaction");
// $data = json_decode($Data, true); // Decode JSON response into PHP array

$labels = [];
$values = [];

foreach ($Data as $item) {
    $labels[] = $item['type']; // Assuming your data has 'label' and 'value' fields
    $values[] = $item['amount'];
}



?>




<!-- start page content wrapper-->
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">


        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-item pe-3" style="color:#ef00ffd1;font-size:30px;font-weight:500;">Dashboard</div>

            <!-- <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-primary"> <img src="../assets/images/logo-icon-2.png"
                            class="logo-icon" alt="logo icon" style="height: 20px; width: 20px; color:#923EB9"> Hello
                        <?php echo ucwords($_SESSION['admin_name'])?> </button>
                    <button type="button"
                        class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="Profile.php">Profile</a>
                        <a class="dropdown-item" href="../logout.php">Logout</a>

                    </div>
                </div>
            </div> -->
        </div>
        <!--end breadcrumb-->
        <a href="advertiser_details.php">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-start gap-2">
                                <div>
                                    <p class="mb-0 fs-6">
                                    <h3>Total Advertiser</h3>
                                    </p>
                                </div>
                                <div class="ms-auto widget-icon-small text-white bg-gradient-purple">
                                    <ion-icon name="wallet-outline"></ion-icon>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <div>
                                    <h4 class="mb-0"><b>
                                            <?php echo $TotalAdvertiser ?>
                                          
                                        </b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </a>
        <a href="publisher_details.php">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <div>
                                <p class="mb-0 fs-6">
                                <h3>Total Publisher</h3>
                                </p>
                            </div>
                            <div class="ms-auto widget-icon-small text-white bg-gradient-info">
                                <ion-icon name="people-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <div>
                                <h4 class="mb-0"><b>
                                        <?php echo $TotalPublisher ?>
                                    </b></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="admin_details.php">

            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <div>
                                <p class="mb-0 fs-6">
                                <h3>Total Admins </h3>
                                </p>
                            </div>
                            <div class="ms-auto widget-icon-small text-white bg-gradient-danger">
                                <ion-icon name="bag-handle-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <div>
                                <h4 class="mb-0"><b>
                                        <?php echo $TotalAdmin ?>
                                    </b></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="ads_page.php">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <div>
                                <p class="mb-0 fs-6">
                                <h3>Advertisement </h3>
                                </p>
                            </div>
                            <div class="ms-auto widget-icon-small text-white bg-gradient-success">
                                <ion-icon name="bar-chart-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <div>
                                <h4 class="mb-0"><b>
                                        <?php echo $TotalAd ?>
                                    </b></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!--end row-->



    <div class="row">
        <div class="col-md-6">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
<!-- end page content-->
</div>
<!--end page content wrapper-->
</div>


<script>
        // Render chart using Chart.js
        // var ctx = document.getElementById('myChart').getContext('2d');
        // var myChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: {
        //         labels: <?php echo json_encode($labels); ?>,
        //         datasets: [{
        //             label: 'Data from MongoDB',
        //             data: <?php echo json_encode($values); ?>,
        //             backgroundColor: 'rgba(255, 99, 132, 0.2)',
        //             borderColor: 'rgba(255, 99, 132, 1)',
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //         }
        //     }
        // });

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Data from MongoDB',
                    data: <?php echo json_encode($values); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
