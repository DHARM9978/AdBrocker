<?php

if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");
  }


require 'base.php';
require '../Modules/advertiser_order_Module.php';
require '../config.php';

$con = Db_Connection();
$Pending_Order=Pending_Order($con);

if(isset($_REQUEST['btnapprove'])){
    $adv_order_id=$_REQUEST['adv_o_id'];
    Pending_to_Approve($con,$adv_order_id);
    $Pending_Order=Pending_Order($con);
}

if(isset($_REQUEST['btndelete'])){
    $adv_order_id=$_REQUEST['adv_order_id'];
    delete_order($con,$adv_order_id);
    $Pending_Order=Pending_Order($con);
}

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
            <div class="breadcrumb-title active pe-3" style="color:#0000FF;border:none;font-size:25px">All Pending Advertiser Order</div>

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
                            <span style="color: #0000FF;">All Pending Advertiser Orders</span>
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
                                <h4 class="text-center text-white">Total Pending Order Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped data-table" style="width: 100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Advertiser Order Id</th>
                                                <th>Advertiser Id</th>
                                                <th>Advertiser Business Id</th>
                                                <th>Advertiser Email</th>
                                                <th>Enterprise Name</th>
                                                <th>Order Date</th>
                                                <th>Approve Date</th>
                                                <th>Transaction Id</th>
                                                <th>Payment Status</th>
                                                <th>Publisher Availibility</th>
                                                <th>Publihser Id</th>
                                                <th>Payable Amount</th>
                                                <th>Order Status</th>
                                                <th>Approve Ads</th>
                                                <th>Cancle Ad</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                    while ($row = $Pending_Order->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <th scope="row" name="advid">
                                                    <?php echo $row["adv_order_id"]; ?>
                                                </th>
                                                <td>
                                                    <?php echo $row["advertiser_id"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["advertiser_bussiness_id"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["advertiser_email"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["enterprise_name"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["order_date"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["approve_date"]; ?>
                                                </td>
                                                <td>

                                                    <?php
                                                    if($row["transaction_id"]==""){
                                                        ?>
                                                    <p style="text-align: center; color: red;"><B>NULL</B></p>
                                                    <?php
                                                    }
                                                    else{
                                                         echo $row["transaction_id"]; 
                                                    }
                                                ?>

                                                </td>
                                                <td>
                                                    <?php 
                                                    if($row["payment_status"] == 1){
                                                       ?>
                                                    <p>Successful</p>
                                                    <?php
                                                    } 
                                                    else{
                                                       ?>
                                                    <p>Unseccessfull</p>
                                                    <?php
                                                    }
                                                    ?>

                                                </td>

                                                <td>
                                                    <?php 
                                                        if($row['publisher_availablility'] == 1){
                                                            ?>
                                                    <p>Available</p>
                                                    <?php
                                                        }
                                                        else{
                                                            ?>
                                                    <p> Not Available</p>
                                                    <?php
                                                        }
                                                    ?>

                                                </td>

                                                <td>
                                                    <?php
                                                    if($row["publisher_id"]==""){
                                                        ?>
                                                    <p style="text-align: center; color: red;"><B>NULL</B></p>
                                                    <?php
                                                    }
                                                    else{
                                                         echo $row["publisher_id"]; 
                                                    }
                                                ?>

                                                </td>
                                                <td>
                                                    <?php echo $row["payable_amount"]; ?>
                                                </td>
                                                <td>
                                                    <b><?php echo $row["order_status"]; ?></b>
                                                </td>

                                                <td>
                                                    <form method="POST" action="./advertiser_pending_Orders.php">
                                                        <!-- Create a form for deletion -->
                                                        <input type="hidden" name="adv_o_id"
                                                            value="<?php echo $row['adv_order_id']; ?>">
                                                        <button type="submit" class="btn btn-success" name="btnapprove"
                                                            value=<?php  echo $row['adv_order_id']?>
                                                            onclick="return confirm('Are you sure , you want to Approve this Advertisement?')">
                                                            <i class="fa-solid fa-check"></i>
                                                            <!-- <i class="bi bi-check2"></i> -->
                                                        </button></a>
                                                    </form>
                                                </td>

                                                <td>
                                                    <form method="POST" action="./advertiser_pending_Orders.php">
                                                        <!-- Create a form for deletion -->
                                                        <input type="hidden" name="adv_order_id"
                                                            value="<?php echo $row['adv_order_id']; ?>">
                                                        <button type="submit" class="btn btn-secondary" name="btndelete"
                                                            onclick="return confirm('Are you sure , you want to Cancle this Advertisement?')"><i
                                                                class="far fa-trash-alt"></i></button>
                                                    </form>
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


<?php
//    require 'footer.php';
?>