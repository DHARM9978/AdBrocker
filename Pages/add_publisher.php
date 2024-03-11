<?php
if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");
  }
require 'base.php';
require '../config.php';
require '../functions.php';
require '../Modules/publishermodule.php';


$con = Db_Connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $encrypt_password = "";
    $pub_id = Publisher_Unique_id($con);

    $pub_name = trim($_POST["pub_name"]);
    $pub_email = trim($_POST["pub_email"]);
    $pub_contact = trim($_POST["pub_contact"]);
    $pub_password = trim($_POST["pub_password"]);

    $encrypt_password = md5($pub_password);
    Add_New_Publisher($con, $pub_id, $pub_name, $pub_email, $pub_contact, $encrypt_password);
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
            <a href="publisher_details.php">
                <div class="breadcrumb-item pe-3" style="color:#ef00ffd1;font-size:25px;font-weight:500;">Publisher
                </div>
            </a>
            <!-- <i class="fa-solid fa-arrow-right" style="font-size:20px;"></i> -->
             <i class="fa-solid fa-chevron-right" style=""></i>
            &nbsp;&nbsp;
            &nbsp;&nbsp;

            <div class="breadcrumb-title active pe-3" style="color:#0000FF;border:none;font-size:25px">Add Publisher
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
                <a style="text-decoration: none;color:#ef00ffd1" href="./ab-dashboard.php">Dashboard/</a>
                <a style="text-decoration: none;color:#ef00ffd1" href="./publisher_details.php">Publisher/</a>
                <span style="color: #0000FF;">Add-Publisher</span>
            </h4>
        </div>
    </div> -->

    <div class="mb-3">
        <form action="./publisher_details.php">
            <div class="d-flex justify-content-end text-center">
                <button type="submit" name="add_publisher_btn" class="btn" style="
                            background: #3c096c;
                            color: #edf2f3;
                            font-weight: 500;">
                    <span class="me-2"><i class="fa-solid fa-arrow-left"></i></span> Back to Publisher Details</button>
            </div>
        </form>
    </div>

    <div class="text-center mt-2">
        <h2>Add Publisher page</h2>
    </div>

    <div class="mt-5 mb-3 d-flex justify-content-center">
        <div class="card p-2"
            style="width: 90%;">
            <div class="container">
                <form action="./add_publisher.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Publisher Name</label>
                        <input type="text" class="form-control" id="pub_name" name="pub_name" placeholder="Name:-"
                            autocomplete="off" style="color: #0F1035;" required>
                        <span id="pub_name_error" style="color: red; text-align: center; font-weight: 600;"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Publisher Email Address</label>
                        <input type="email" class="form-control" id="pub_email" name="pub_email" placeholder="Email:-"
                            autocomplete="off" style="color: #0F1035;" required>
                        <span id="pub_email_error" style="color: red; text-align: center; font-weight: 600;"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Publisher Contact No.</label>
                        <input type="tel" class="form-control" id="pub_contact" name="pub_contact"
                            placeholder="Contact No:-" autocomplete="off" pattern="[0-9]*" style="color: #0F1035;"
                            maxlength="10"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            required>
                        <span id="pub_contact_error" style="color: red; text-align: center; font-weight: 600;"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="pub_password" name="pub_password"
                            placeholder="Password:-" autocomplete="off" minlength="8" style="color: #0F1035;" required>
                        <span id="pub_password_error" style="color: red; text-align: center; font-weight: 600;"></span>
                    </div>
            </div>
            <div class="d-flex justify-content-center mb-3 text-center">
                <button type="submit" name="add_new_publisher" class="btn" style="width: 50%;
                            background:#3c096c;
                            color: #edf2f3;
                            font-weight: 500;">
                    Add New Publisher</button>
            </div>
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $("#pub_name").blur(function () {
                $("#pub_name_error").hide();
                pubnamevalidation();
            });

            $("#pub_email").blur(function () {
                $("#pub_email_error").hide();
                pubemailvalidation();
            });

            $("#pub_contact").blur(function () {
                $("#pub_contact_error").hide();
                pubcontactvalidation();
            });

            $("#pub_password").blur(function () {
                $("#pub_password_error").hide();
                pubpasswordvalidation();
            });
        });

        function pubnamevalidation() {
            var namespecialcharacter = /^[A-Za-z0-9]+$/
            if ($("#pub_name").val() == "") {
                $("#pub_name").css("border", "2px solid red");
                $("#pub_name_error").show();
                $("#pub_name_error").html("Name can't be empty");
                return false;
            }
            else if(!namespecialcharacter.test($("#pub_name").val())) {
                $("#pub_name").css("border", "2px solid red");
                $("#pub_name_error").show();
                $("#pub_name_error").html("Name should not containe special characters");
                return false;
            }
            else {
                $("#pub_name").css("border", "none");
                $("#pub_name_error").hide();
                return true;
            }
        }

        function pubemailvalidation() {
            var email = $("#pub_email").val();

            if (email == "") {
                $("#pub_email").css("border", "2px solid red");
                $("#pub_email_error").show();
                $("#pub_email_error").html("Email id can't be empty");
                return false;
            }
            else if (IsEmail(email) == false) {
                $("#pub_email").css("border", "2px solid red");
                $("#pub_email_error").show();
                $("#pub_email_error").html("Email id is not in a proper formate");
                return false;
            }
            else {
                $("#pub_email").css("border", "none");
                $("#pub_email_error ").hide();
                return true;
            }

            function IsEmail(email) {
                const regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    return false;
                }
                else {
                    return true;
                }
            }
        }

        function pubcontactvalidation() {
            contactnumberlength = $("#pub_contact").val();
            if ($("#pub_contact").val() == "") {
                $("#pub_contact").css("border", "2px solid red");
                $("#pub_contact_error").show();
                $("#pub_contact_error").html("Contact should not be empty");
                return false;
            }
            else if (contactnumberlength.length < 10) {
                $("#pub_contact").css("border", "2px solid red");
                $("#pub_contact_error").show();
                $("#pub_contact_error").html("Contact number must containe 10 digits");
                return false;
            }
            else {
                $("#pub_contact").css("border", "none");
                $("#pub_contact_error").hide();
                return true;
            }
        }

        function pubpasswordvalidation() {

            password = $("#pub_password").val();

            var specialcharacter = /^[A-Za-z0-9]+$/

            if ($("#pub_password").val() == "") {
                $("#pub_password").css("border", "2px solid red");
                $("#pub_password_error").show();
                $("#pub_password_error").html("Password should not be empty");
                return false;
            }

            if (password.length < 8) {
                $("#pub_password").css("border", "2px solid red");
                $("#pub_password_error").show();
                $("#pub_password_error").html("Password containe minimum 8 characters");
                return false;
            }
            else if (!password.match(/[A-Z]/)) {
                $("#pub_password").css("border", "2px solid red");
                $("#pub_password_error").show();
                $("#pub_password_error").html("Password containe a capital letter");
                return false;
            }
            else if (!password.match(/[0-9]/)) {
                $("#pub_password").css("border", "2px solid red");
                $("#pub_password_error").show();
                $("#pub_password_error").html("Password containe a number");
                return false;
            }
            else if (password.match(specialcharacter)) {
                $("#pub_password").css("border", "2px solid red");
                $("#pub_password_error").show();
                $("#pub_password_error").html("Password containe a special character");
                return false;
            }
            else {
                $("#pub_password").css("border", "none");
                $("#pub_password_error").hide();
                return true;
            }

        }


    </script>

</main>
    </div>
    </div>
    </div>
    <?php
        // require 'footer.php';
    ?>


