<?php
if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");
  }


require 'base.php';
require '../Modules/SubscriptionAPI.php';
$url="https://admanager-s9eo.onrender.com/plans";
$data=totalSubscription($url);



?>
<!-- Start of Subscription -->

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
            <div class="breadcrumb-title active pe-3" style="color:#0000FF;border:none;font-size:25px">Subscription
            </div>

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

                <div class="text-center mt-2 mb-3">
                    <h2>All Subscription</h2>
                </div>
                <div class="mb-3">
                    <form action="add_subscription.php">
                        <div class="d-flex justify-content-end mb-3 me-2 text-center">
                            <button type="submit" name="add_subscription_btn" class="btn" style="
                            background: #3c096c;
                            color: #edf2f3;
                            font-weight: 500;">
                                <span class="me-2"><i class="fa-solid fa-user-plus"></i></span> Add New
                                Subscription</button>
                        </div>
                    </form>
                </div>
                <div class="my-3">
                    <div class="col-md-12 mb-3 w-100">
                        <div class="card">
                            <div class="card-header" style="background-color: #3c096c;">
                                <h4 class="text-center text-white">Subscription Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped data-table table-hover "
                                        style="width: 100%">

                                        <thead class="text-center">
                                            <tr>
                                                <th>Name</th>
                                                <th>Views</th>
                                                <th>Price</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                    foreach($data as $row) {
                                    ?>
                                            <tr>
                                                <th scope="row">
                                                    <?php echo $row["name"]; ?>
                                                </th>
                                                <td>
                                                    <?php echo $row["views"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["price"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["type"]; ?>
                                                </td>
                                                <td>
                                                   <?php 
                                                if($row['status']=="Active"){
                                                    ?>
                                                        <div class="text-center"
                                                            style="background-color: #198754; color: white;border-radius: 4px;font-weight: bold;box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, 0.2), 3px 6px 9px 0 rgba(0, 0, 0, 0.19);">
                                                            <p class="p-1"><?php echo "Active"?></p>
                                                        </div>
                                                        <?php } 
                                                    else { ?>
                                                        <div class="text-center"
                                                            style="background-color: #dc3545; color: white;border-radius: 4px;font-weight: bold;box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, 0.2), 3px 6px 9px 0 rgba(0, 0, 0, 0.19);">
                                                            <p class="p-1"><?php echo "Inactive"?></p>
                                                        </div>
                                                        <?php }

                                                        ?>
                                                    
                                                </td>
                                                <td>
                                                <?php  
                                                    $date= $row['createdAt'];
                                                    $finaldate=date("d-m-Y", strtotime($date));
                                                    echo $finaldate;
                                                    

                                                    ?>
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

</div>


<!-- End Of Subscription -->