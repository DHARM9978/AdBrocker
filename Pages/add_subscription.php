<?php
if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBroker_AdminPanel/admin-login.php");
  }

    require 'base.php';
    require '../config.php';
    require '../Modules/subscription_module.php';
    require '../functions.php';

    
$con = Db_Connection();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $subscription_id = Subscription_Unique_id($con);

    $price = trim($_POST["price"]);
    $duration = trim($_POST["duration"]);
    $no_of_days = trim($_POST["no_of_days"]);
    $traffic_strength = trim($_POST["traffic_strength"]);

    Add_New_Subscription($con, $subscription_id, $price, $duration, $no_of_days, $traffic_strength);
}

?>

<script src="../assets/js/jquery-3.6.0.min.js"></script>
<div class="page-content-wrapper">

    <div class="page-content">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

            <!-- <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div> -->

            <a href="ab-dashboard.php">
                <div class="breadcrumb-item pe-3" style="color:#ef00ffd1;font-size:25px;font-weight:500;">Dashboard
                </div>
            </a>

            <!-- <i class="fa-solid fa-arrow-right" style="font-size:20px;"></i> -->
             <i class="fa-solid fa-chevron-right" style=""></i>
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            <a href="subscription.php">
                <div class="breadcrumb-item pe-3" style="color:#ef00ffd1;font-size:25px;font-weight:500;">Subscription
                </div>
            </a>
            <!-- <i class="fa-solid fa-arrow-right" style="font-size:20px;"></i> -->
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
            <!-- <div class="my-3">
        <div class="col-md-12 text-left">
            <h4>
                <a style="text-decoration: none;color:#ef00ffd1" href="ab-dashboard.php">Dashboard/</a>
                <a style="text-decoration: none;color:#ef00ffd1" href="subscription.php">Subscription/</a>
                <span style="color: #0000FF;">Add-Subscription</span>
            </h4>
        </div>
    </div> -->

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
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Price:-"
                                    autocomplete="off" style="color: #0F1035;" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Duration</label>
                                <input type="number" class="form-control" name="duration"
                                    placeholder="Duration:- ex:- 1 month" autocomplete="off" style="color: #0F1035;"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No of Days</label>
                                <input type="text" class="form-control" name="no_of_days"
                                    placeholder="No of Days:- ex:- if one month then enter 28" autocomplete="off"
                                    pattern="[0-9]*" style="color: #0F1035;" maxlength="10" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Traffic Strength</label>
                                <input type="text" class="form-control" name="traffic_strength"
                                    placeholder="Traffic Strength ex:- 10k-50k" autocomplete="off"
                                    style="color: #0F1035;" required>
                            </div>
                    </div>
                    <div class="d-flex justify-content-center mb-3 text-center">
                        <button type="submit" name="add_new_subscription" class="btn" style="width: 50%;
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

<?php

require 'footer.php';
?>