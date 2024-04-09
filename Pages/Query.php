<?php

if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");
  }


require 'base.php';
require '../Modules/QueryAPI.php';

$AllData=GetAllQuery("https://admanager-s9eo.onrender.com/message");

$AllPendingData=GetPendingQuery("https://admanager-s9eo.onrender.com/message/pendings");

// echo "<script>alert('$AllData')</script>";

if(isset($_REQUEST['btnanswer'])){
    $id=$_REQUEST['btnanswer'];
    $data=["id"=>$id];
    $response=UpdateQuery("https://admanager-s9eo.onrender.com/message/repled",$data);
    echo '<script>window.location.href = "Query.php";</script>';
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
            <div class="breadcrumb-title active pe-3" style="color:#0000FF;border:none;font-size:25px">Queries</div>

        </div>
    </div>

    <main class="" style="color: #0F1035;">
        <div class="p-2">

            <div class="text-center mt-2 mb-3">
                <h2>Queries</h2>
            </div>
            <br>
            <br>
            <div class="my-3">
                <div class="container" style="padding-left:96%">
                    <labal style="padding-left:8px">filter</labal>
                    <button id="btnpending" name="btnpending" style="border:none;cursor:pointer;background: none;width:50px">
                        <img src="../assets/Icons/ShowAll.png" id="showidimg" name="showidimg"
                            style="height:35px;width:35px">
                    </button>
                </div>
                <div class="col-md-12 mb-3 w-100">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="Alldata" class="table table-striped data-table" style="width: 100%">
                                    <thead class="text-center">
                                        <tr>

                                            <th>Title</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Query</th>
                                            <th>Approved</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                    foreach($AllData as $row) {
                                        
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['title']?>
                                            </td>
                                            <td>
                                                <?php echo $row['email']?>
                                            </td>
                                            <td>
                                                <?php echo $row['mobile']?>
                                            </td>
                                            <td>
                                                <?php echo $row['detail']?>
                                            </td>
                                            <td>
                                                <?php 

                                                if($row['answer']==false){
                                                ?>
                                                 <form method="POST" action="./Query.php">
                                                    <button type="submit" class="btn btn-warning" name="btnanswer"
                                                    style="height:36px;width:100px;display:flex;justify-content:center"
                                                        value="<?php echo  $row['_id']?>"
                                                        onclick="return confirm('Are you sure , you give answer to this query?')">
                                                        Pending
                                                        <!-- <i class="bi bi-check2"></i> -->
                                                    </button></a>
                                                </form>
                                                <?php
                                                }else{
                                                    ?>
                                                    <button type="submit" class="btn btn-success" name="btnanswer" style="height:36px;width:100px;display:flex;justify-content:center"                                                        value="<?php echo  $row['_id']?>"
                                                       >
                                                       Replied
                                                    </button></a>
                                             
                                                    <?php
                                                }
            
                                                ?>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>


                                <table id="PendingData" class="table table-striped data-table" style="width: 100%">
                                    <thead class="text-center">
                                        <tr>

                                            <th>Title</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Query</th>
                                            <th>Approved</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                    foreach($AllPendingData as $row) {
                                        
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['title']?>
                                            </td>
                                            <td>
                                                <?php echo $row['email']?>
                                            </td>
                                            <td>
                                                <?php echo $row['mobile']?>
                                            </td>
                                            <td>
                                                <?php echo $row['detail']?>
                                            </td>
                                            <td>
                                                <?php 

if($row['answer']==false){
    ?>
     <form method="POST" action="./Query.php">
        <button type="submit" class="btn btn-warning" name="btnanswer"
        style="height:36px;width:100px;display:flex;justify-content:center"
            value="<?php echo  $row['_id']?>"
            onclick="return confirm('Are you sure , you give answer to this query?')">
            Pending
            <!-- <i class="bi bi-check2"></i> -->
        </button></a>
    </form>
    <?php
    }else{
        ?>
        <button type="submit" class="btn btn-success" name="btnanswer" style="height:36px;width:100px;display:flex;justify-content:center"                                                        value="<?php echo  $row['_id']?>"
           >
           Replied
        </button></a>
 
        <?php
    }

    ?>
                                            </td>
                                        </tr>
                                        <?php }?>
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
$(document).ready(function() {

    $("#PendingData").hide();

    $('#btnpending').click(function() {
        // Get the current src attribute of the image
        var currentSrc = $('#showidimg').attr('src');

        // Define the two image sources
        var image1 = '../assets/Icons/ShowAll.png';
        var image2 = '../assets/Icons/Pending.png';

        // Toggle between the two images
        var newSrc = (currentSrc === image1) ? image2 : image1;

        if (currentSrc === image1) {
            $("#Alldata").hide();
            $("#PendingData").show();
        }
        if (currentSrc === image2) {
            $("#PendingData").hide();
            $("#Alldata").show();
        }


        // Set the new src attribute of the image
        $('#showidimg').attr('src', newSrc);
    });
});
</script>