<?php


if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");
  }

  require './base.php';
  require '../Modules/PublisherAppDataAPI.php';

  $Data=totalPublisherAppDataAPI("https://admanager-s9eo.onrender.com/application");

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
                    <h2>Publisher App Data</h2>
                </div>
                
                <div class="my-3">
                    <div class="col-md-12 mb-3 w-100">
                        <div class="card">
                            <div class="card-header" style="background-color: #3c096c;">
                                <h4 class="text-center text-white">Publisher App Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped data-table" style="width: 100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th> ID</th>
                                                <th>Name</th>
                                                <th>Publisher ID</th>
                                                <th>Bundle ID</th>
                                                <th>Catagory</th>
                                                <th>Total Views</th>
                                                <th>Total Clicks</th>
                                                <th>Total Earn</th>

                                                
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                    foreach($Data as $row) {
                    
                                    ?>
                                            <tr>


                                                <td>
                                                    <?php echo $row['_id']?>
                                                </td>
                                                <td>
                                                    <?php echo $row['name']  ?>
                                                </td>
                                                <td>
                                                    <?php  echo $row['publisherId'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['bundleId']  ?>
                                                </td>

                                                <td>
                                                    <?php echo $row['catagory']  ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['total_Views']  ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['totalClicks']  ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['totalEarn']  ?>
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