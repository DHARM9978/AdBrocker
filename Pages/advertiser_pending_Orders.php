<?php

if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");
  }


require "base.php";
require "../Modules/AdvertiseAPI.php";
require '../Modules/advertiser_order_Module.php';


$Data=totalAdvertiseAPI("https://admanager-s9eo.onrender.com/advertise");


if(isset($_REQUEST['btnapprove'])){

$id=$_REQUEST['advid'];

Pending_to_Approve($id);
echo '<script>window.location.href = "advertiser_Approved_orders.php";</script>';


}

if(isset($_REQUEST['btndelete'])){

    $id=$_REQUEST['advdelid'];
    
    Delete_Order($id);
    echo '<script>window.location.href = "advertiser_history_order.php";</script>';
    
}
    

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
            <div class="breadcrumb-title active pe-3" style="color:#0000FF;border:none;font-size:25px">All Aprroved
                Advertiser Orders</div>

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
    </div>

    <main class="" style="color: #0F1035;">
        <div class="p-2">

            <div class="text-center mt-2 mb-3">
                <h2>All Pending Orders</h2>
            </div>
            <br>
            <br>
            <div class="my-3">
                <div class="col-md-12 mb-3 w-100">
                    <div class="card">
                        <div class="card-header" style="background-color: #3c096c;">
                            <h4 class="text-center text-white">Total Approved Order Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Ad Image</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Ramaine Views</th>
                                            <th>Catagoty</th>
                                            <th>Status </th>
                                            <th>Approve</th>
                                            <th>Create Date</th>
                                            <th>Update Date</th>
                                            <th>Approve</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                    foreach($Data as $row) {
                                        if($row['status']=="pending"){
                                    ?>
                                        <tr>

                                            <td>
                                                <img src="<?php echo $row['image'] ?>" height="50px" width="50px"
                                                    alt="No Image Inserted" alt="No Image Inserted" id="advimage"
                                                    name="advimage"
                                                    onerror="this.onerror=null; this.src='../assets/images/No_Image.jpg';">
                                            </td>
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

                                                <?php echo $row['category']?>

                                            </td>

                                            <td>

                                                <?php
                                                    if($row['status'] == "ongoing"){
                                                        ?>
                                                <div class="text-center"
                                                  >
                                                    <p class="p-1" style="color:green;font-width:600"><?php echo $row['status']?></p>
                                                </div>
                                                <?php } 
                                                    else if ($row['status'] == "pending")
                                                     {?>
                                                <div class="text-center"
                                                >
                                                    <p class="p-1" style="color:yellow;font-width:600"><?php echo $row['status']?></p>
                                                </div>
                                                <?php
                                                    }
                                                    else{?>
                                                <div class="text-center"
                                                   >
                                                    <p class="p-1" style="color:red;font-width:600"><?php echo $row['status']?></p>
                                                </div>
                                                <?php }?>

                                            </td>
                                            <td>

                                                <?php 
                                                if($row['approve']==true){
                                                    ?>
                                                <div class="text-center">
                                                    <p class="p-1" style="color:green"><?php echo "Approved" ?></p>
                                                </div>
                                                <?php } 
                                                    else { ?>
                                                <div class="text-center">
                                                    <p class="p-1" style="color:red"><?php echo "Not Approved" ?></p>
                                                </div>
                                                <?php }

                                                        ?>

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
                                            <td>
                                                <form method="POST" action="./advertiser_pending_Orders.php">
                                                   
                                                    <input type="hidden" name="advid" id="advid"
                                                        value="<?php echo  $row['_id']?>">


                                                    <button type="submit" class="btn btn-success" name="btnapprove"
                                                        value="<?php echo  $row['_id']?>"
                                                        onclick="return confirm('Are you sure , you want to Approve this Advertise?')">
                                                        <i class="fa-solid fa-check"></i>
                                                        <!-- <i class="bi bi-check2"></i> -->
                                                    </button></a>
                                                </form>
                                            </td>
                                            <td>
                                                <form method="POST" action="./advertiser_pending_Orders.php">
                                                <input type="hidden" name="advdelid" id="advdelid"
                                                        value="<?php echo  $row['_id']?>">

                                           
                                                    <button type="submit" class="btn btn-secondary" name="btndelete"
                                                        value="<?php echo  $row['_id']?>"
                                                        onclick="return confirm('Are you sure , you want to Remove this Advertiser?')"><i
                                                            class="far fa-trash-alt" aria-hidden="true"></i></button>
                                                </form>
                                            </td>


                                        </tr>
                                        <?php } }?>
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

<script>
        // Auto-refresh after form submission
        window.onload = function() {
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        };
</script>