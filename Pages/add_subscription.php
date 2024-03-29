<?php
if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");
  }

    require 'base.php';
    require '../Modules/SubscriptionAPI.php';
    require '../Modules/subscription_module.php';
    

    
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$Name=$_REQUEST['Plan_Name'];
$Price=$_REQUEST['price'];
$Views=$_REQUEST['views'];
$Type=$_REQUEST['Type'];

Add_New_Subscription($Name,$Price,$Views,$Type);

}


?>

<script src="../assets/js/jquery-3.6.0.min.js"></script>
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
            <a href="subscription.php">
                <div class="breadcrumb-item pe-3" style="color:#ef00ffd1;font-size:25px;font-weight:500;">Subscription
                </div>
            </a>
            <i class="fa-solid fa-chevron-right" style=""></i>
            &nbsp;&nbsp;
            &nbsp;&nbsp;

            <div class="breadcrumb-title active pe-3" style="color:#0000FF;border:none;font-size:25px">Add Subscription
            </div>



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
                            href="javascript:;">Profile</a>
                        <a class="dropdown-item" href="../logout.php">Logout</a>

                    </div>
                </div>
            </div> -->
        </div>


        <main class="" style="color: #0F1035;">

            <div class="mb-3">
                <form action="./subscription.php">
                    <div class="d-flex justify-content-end  text-center">
                        <button type="submit" name="add_subscription_btn" class="btn" style="
                            background: #3c096c;
                            color: #edf2f3;
                            font-weight: 500;">
                            <span class="me-2"><i class="fa-solid fa-arrow-left"></i></span> Back to Subscription
                            Details</button>
                    </div>
                </form>
            </div>

            <div class="text-center mt-2">
                <h2>Add Subscription page</h2>
            </div>

            <div class="mt-5 mb-3 d-flex justify-content-center">
                <div class="card p-2" style="width: 90%; background-color:">
                    <div class="container">
                        <form action="./add_subscription.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Plan Name</label>
                                <input type="text" class="form-control" name="Plan_Name" id="Plan_Name"
                                    placeholder="Enter Plan Name ex:-xyz" autocomplete="off" style="color: #0F1035;"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="Price:-"
                                    autocomplete="off" style="color: #0F1035;" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total Views</label>
                                <input type="number" class="form-control" name="views" id="views"
                                    placeholder="Enter Total Views that we provide" autocomplete="off" style="color: #0F1035;"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Type</label>
                                <input type="text" class="form-control" name="Type" id="Type"
                                    placeholder="Either Banner or Interstitial" autocomplete="off"
                                    style="color: #0F1035;" maxlength="10" required>
                            </div>

                    </div>
                    <div class="d-flex justify-content-center mb-3 text-center">
                        <button type="submit" name="add_new_subscription" id="add_new_subscription" class="btn" style="width: 50%;
                            background:#3c096c;
                            color: #edf2f3;
                            font-weight: 500;">
                            Add New Subscription</button>
                    </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
</div>