<?php


if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");
  }

  require './base.php';
  require '../Modules/TransactionAPI.php';

 
$Data=TotalTransaction("https://admanager-s9eo.onrender.com/transaction");
 

?>


<div class="page-content-wrapper">

    <div class="page-content">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <a href="ab-dashboard.php">
                <div class="breadcrumb-item pe-3" style="color:#ef00ffd1;font-size:25px;font-weight:500;">Dashboard
                </div>
            </a>

            <!-- <i class="fa-solid fa-arrow-right" style="font-size:20px;"></i> -->
            <i class="fa-solid fa-chevron-right" style=""></i>
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            <div class="breadcrumb-title active pe-3" style="color:#0000FF;border:none;font-size:25px">Advertiser</div>

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
                    <h2>All Advertisers</h2>
                </div>
                <!-- <div class="mb-3">
                    <form action="add_advertiser.php">
                        <div class="d-flex justify-content-end mb-3 me-2 text-center">
                            <button type="submit" name="add_admin_btn" class="btn" style="
                            background: #3c096c;
                            color: #edf2f3;
                            font-weight: 500;">
                                <span class="me-2"><i class="fa-solid fa-user-plus"></i>&nbsp; Add New
                                    Advertisers</button>
                        </div>
                    </form>
                </div> -->
                <div class="my-3">
                    <div class="col-md-12 mb-3 w-100">
                        <div class="card">
                            <div class="card-header" style="background-color: #3c096c;">
                                <h4 class="text-center text-white">Advertiser Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped data-table" style="width: 100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Advertiser ID</th>
                                                <th>Advertiser ID</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                                <th>Transaction Date</th>

                                                <!-- <th>Remove Advertiser</th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                    foreach($Data as $row) {
                                        if($row['type']=='Credit'){
                                    ?>
                                            <tr>


                                                <td>
                                                    <?php echo $row['advertisId']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['advertiserId']  ?>
                                                </td>
                                                <td>
                                                    <?php  echo $row['amount'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['type']  ?>
                                                </td>
                                                <td>
                                                    <?php  
                                                    $date= $row['updatedAt'];
                                                    $finaldate=date("d-m-Y", strtotime($date));
                                                    echo $finaldate;
                                                    

                                                    ?>
                                                </td>

                                            </tr>
                                            <?php }} ?>
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
<!-- End of advertiser Details -->