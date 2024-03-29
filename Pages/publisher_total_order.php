<?php

if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");
  }


require './base.php';
require '../Modules/PublisherAPI.php';
// require '../Modules/publisher_order_module.php';
// require '../config.php';

// $con = Db_Connection();
// $All_Publisher_Order=All_Publisher_Order($con);

$url="https://admanager-s9eo.onrender.com/advertise/rand";

$data=totalAdPublisherAPI($url);
$finaldata=json_encode($data);
echo "<script>alert('$finaldata')</script>";

?>


<div class="page-content-wrapper">

    <div class="page-content">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <a href="ab-dashboard.php">
                <div class="breadcrumb-item pe-3" style="color:#ef00ffd1;font-size:25px;font-weight:500;">Dashboard
                </div>
            </a>
            <i class="fa-solid fa-chevron-right" style=""></i>
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            <div class="breadcrumb-title active pe-3" style="color:#0000FF;border:none;font-size:25px">All Publisher
                Order</div>

            <!-- <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-primary"> <img src="../assets/images/logo-icon-2.png"
                            class="logo-icon" alt="logo icon" style="height: 20px; width: 20px; color:#923EB9"> Hello
                        <?php ucwords($_SESSION['admin_name'])?>
                    </button>
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

        <main class="" style="color: #0F1035;">
            <div class="p-2">

                <div class="text-center mt-2 mb-3">
                    <h2>All Orders</h2>
                </div>
                <br>
                <br>
                <div class="my-3">
                    <div class="col-md-12 mb-3 w-100">
                        <div class="card">
                            <div class="card-header" style="background-color: #3c096c;">
                                <h4 class="text-center text-white">Total Publisher Order Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped data-table" style="width: 100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Publisher Order Id</th>
                                                <th>Publisher Id</th>
                                                <th>Publisher Business Id</th>
                                                <th>Publisher Email</th>
                                                <th>Enterprise Name</th>
                                                <th>url</th>
                                                <th>Order Date</th>
                                                <th>Approve Date</th>
                                                <th>Advertiser Availibility</th>
                                                <th>Admin Approval</th>
                                                <th>Advertisement Id</th>



                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                //    foreach($data as $row)
                                {
                                    ?>
                                            <tr>
                                                <th scope="row">
                                                    <?php echo $row["name"]; ?>
                                                </th>
                                                <td>
                                                    <?php echo $row["pub_order_id"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["publisher_bussiness_id"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["pub_email"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["bussiness_name"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["url"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["order_date"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["approve_date"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["ads_availability"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["admin_approval"]; ?>
                                                </td>

                                                <td>
                                                    <?php
                                                        if($row["advertisement_id"]==''){
                                                            ?>
                                                    <p style="color:red;"><b> Null </b></p>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <?php echo $row["advertisement_id"]; ?>
                                                </td>



                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- end of publisher details -->
</div>