<?php


if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");
  }

  require './base.php';
  require '../Modules/TransactionAPI.php';
  require '../Modules/AdvertiserAPI.php';

 
$Data=TotalTransaction("https://admanager-s9eo.onrender.com/transaction");
$AdvertiserData=totalAdvertiserAPI("https://admanager-s9eo.onrender.com/fire/advertisers");

// $combinedData = array_merge($Data, $AdvertiserData);

// echo "<script>alert('$combinedData')</script>";

// $jsonArray = json_encode($combinedData);
// echo "<script>console.log(" . $jsonArray . ");</script>";



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
            <div class="breadcrumb-title active pe-3" style="color:#0000FF;border:none;font-size:25px">Advertiser</div>

           
        </div>

        <main class="" style="color: #0F1035;">
            <div class="p-2">

                <div class="text-center mt-2 mb-3">
                    <h2>All Advertisers</h2>
                </div>
                
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
                                                <th>Advertise ID</th>
                                                <th>Advertiser ID</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                                <th>Transaction Date</th>

                                                
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