<?php

if ($_SESSION["is_loggedin"] == false) {
  header("Location:/AdBroker_AdminPanel/admin-login.php");
}

require './base.php';
require '../config.php';
require '../Modules/dashboardmodule.php';



$con = Db_Connection();

$number_of_advertisers = Total_Advertisers($con);
$number_of_publishers = Total_Publishers($con);
$number_of_admins = Total_Admins($con);
$number_of_advertisements = Total_Advertisements($con);

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
                                            <?php echo $number_of_advertisers ?>
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
                                        <?php echo $number_of_publishers ?>
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
                                        <?php echo $number_of_admins ?>
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
                                        <?php echo $number_of_advertisements ?>
                                    </b></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!--end row-->
</div>
<!-- end page content-->
</div>
<!--end page content wrapper-->
</div>

<?php
//   require 'footer.php';
?>