<?php
if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBroker_AdminPanel/admin-login.php");
  }


require 'base.php';
require '../config.php';
require '../Modules/subscription_module.php';


$con = Db_Connection();
$all_Subscriptions = Get_All_Subscriptions($con);

if (isset($_REQUEST["subscription_id"])) {
    Remove_Subscription($con, $_REQUEST["subscription_id"]);
    $all_Subscriptions = Get_All_Subscriptions($con);
}

?>
<!-- Start of Subscription -->

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
                <!-- <div class="my-3">
                    <div class="col-md-12 text-left">
                        <h4>
                            <a style="text-decoration: none;color:#ef00ffd1" href="ab-dashboard.php">Dashboard/</a>
                            <span style="color: #0000FF;">Subscription</span>
                        </h4>
                    </div>
                </div> -->
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
                                                <th>Subscription Id</th>
                                                <th>Price</th>
                                                <th>Duration</th>
                                                <th>No of days</th>
                                                <th>Traffic Strength</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                    while ($row = $all_Subscriptions->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <th scope="row">
                                                    <?php echo $row["subscription_id"]; ?>
                                                </th>
                                                <td>
                                                    <?php echo $row["price"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["duration"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["no_of_days"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["traffic_strength"]; ?>
                                                </td>
                                                <td>
                                                    <form method="POST" action="./subscription.php">
                                                        <!-- Create a form for deletion -->
                                                        <input type="hidden" name="subscription_id"
                                                            value="<?php echo $row['subscription_id']; ?>">
                                                        <button type="submit" class="btn btn-secondary" name="delete"
                                                            onclick="return confirm('Are you sure , you want to Remove this Subscription?')"><i
                                                                class="far fa-trash-alt"
                                                                aria-hidden="true"></i></button>
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

</div>


<!-- End Of Subscription -->

<?php
  require 'footer.php';
?>