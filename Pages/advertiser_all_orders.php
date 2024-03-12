<?php

if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");
  }

require 'base.php';
// require '../Modules/advertiser_order_Module.php';
// require '../config.php';

// $con = Db_Connection();
// $all_advertiser_order=Total_Orders($con);

// $url = "";
// $method = "";

//totalOrderAPI(https://localhost/advertise,);


require "base.php";
require "../Modules/AdvertiseAPI.php";


$Data=totalAdvertiseAPI("https://admanager-s9eo.onrender.com/advertise");



?>


<div class="page-content-wrapper">

    <div class="page-content">

    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <a href="ab-dashboard.php">
                <div class="breadcrumb-item pe-3"
                    style="color:#ef00ffd1;font-size:25px;font-weight:500;">Dashboard
                </div>
            </a>
            
            <!-- <i class="fa-solid fa-arrow-right" style="font-size:20px;"></i> -->
            <i class="fa-solid fa-chevron-right" style=""></i>
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            <div class="breadcrumb-title active pe-3" style="color:#0000FF;border:none;font-size:25px">All Advertiser Order</div>

            <!-- <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-primary"> <img src="../assets/images/logo-icon-2.png"
                            class="logo-icon" alt="logo icon" style="height: 20px; width: 20px; color:#923EB9"> Hello
                        <?php echo ucwords($_SESSION['admin_name'])?>
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
                <!-- <div class="my-3">
                    <div class="col-md-12 text-left">
                        <h4>
                            <a style="text-decoration: none;color:#ef00ffd1" href="ab-dashboard.php">Dashboard/</a>
                            <span style="color: #0000FF;">All Advertiser Orders</span>
                        </h4>
                    </div>
                </div> -->
                <div class="text-center mt-2 mb-3">
                    <h2>All Orders</h2>
                </div>
                <br>
                <br>
                <div class="my-3">
                    <div class="col-md-12 mb-3 w-100">
                        <div class="card">
                            <div class="card-header" style="background-color: #3c096c;">
                                <h4 class="text-center text-white">Total Order Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Ramaine Views</th>
                                                <th>Status </th>
                                                <th>Approve</th>
                                                <th>Create Date</th>
                                                <th>Update Date</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                    foreach($Data as $row) {
                                    ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row['title']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['type']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['remain_Views']?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($row['status'] == "ongoing"){
                                                        ?>
                                                    <div class="text-center"
                                                        style="background-color: #198754; color: white;border-radius: 4px;font-weight: bold;box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, 0.2), 3px 6px 9px 0 rgba(0, 0, 0, 0.19);">
                                                        <p class="p-1"><?php echo $row['status']?></p>
                                                    </div>
                                                    <?php } 
                                                    else if ($row['status'] == "pending")
                                                     {?>
                                                    <div class="text-center"
                                                        style="background-color: #c9c936; color: white;border-radius: 4px;font-weight: bold;box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, 0.2), 3px 6px 9px 0 rgba(0, 0, 0, 0.19);">
                                                        <p class="p-1"><?php echo $row['status']?></p>
                                                    </div>
                                                    <?php
                                                    }
                                                    else{?>
                                                    <div class="text-center"
                                                        style="background-color: #dc3545; color: white;border-radius: 4px;font-weight: bold;box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, 0.2), 3px 6px 9px 0 rgba(0, 0, 0, 0.19);">
                                                        <p class="p-1"><?php echo $row['status']?></p>
                                                    </div>
                                                    <?php }?>
                                                </td>
                                                <td>
                                                    <b> <?php 
                                                if($row['approve']==true){
                                                    ?>
                                                        <div class="text-center"
                                                            style="background-color: #198754; color: white;border-radius: 4px;font-weight: bold;box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, 0.2), 3px 6px 9px 0 rgba(0, 0, 0, 0.19);">
                                                            <p class="p-1"><?php echo "Approved" ?></p>
                                                        </div>
                                                        <?php } 
                                                    else { ?>
                                                        <div class="text-center"
                                                            style="background-color: #dc3545; color: white;border-radius: 4px;font-weight: bold;box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, 0.2), 3px 6px 9px 0 rgba(0, 0, 0, 0.19);">
                                                            <p class="p-1"><?php echo "Not Approved" ?></p>
                                                        </div>
                                                        <?php }

                                                        ?>
                                                    </b>
                                                </td>
                                                <td>
                                                    <?php 
                                                    
                                                    $date= $row['updatedAt'];
                                                    $finaldate=date("d-m-Y", strtotime($date));
                                                    echo $finaldate;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                    $date= $row['updatedAt'];
                                                    $finaldate=date("d-m-Y", strtotime($date));
                                                    echo $finaldate;
                                                    ?>
                                                </td>

                                                <!-- <td> -->
                                                <!-- <form method="POST" action="./ads_page.php"> -->
                                                <!-- /            Create a form for deletion -->
                                                <!-- <input type="hidden" name="pub_o_id" -->
                                                <!-- value="$row['advertiserId']"> -->
                                                <!-- <button type="submit" class="btn btn-success" name="btnapprove" -->
                                                <!-- value="" -->
                                                <!-- onclick="return confirm('Are you sure , you want to Approve this Publisher?')"> -->
                                                <!-- <i class="fa-solid fa-check"></i> -->
                                                <!-- <i class="bi bi-check2"></i> -->
                                                <!-- </button></a> -->
                                                <!--    </form> -->
                                                <!-- </td> -->


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

<?php
//    require 'footer.php';
?>