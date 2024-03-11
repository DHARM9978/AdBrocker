<?php

if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBroker_AdminPanel/admin-login.php");
  }
  
require 'base.php';
require '../Modules/adminmodule.php';
require '../functions.php';
require '../config.php';


$con = Db_Connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $encrypt_password = "";
    $adm_id = Admin_Unique_id($con);

    $adm_name = trim($_POST["adm_name"]);
    $adm_email = trim($_POST["adm_email"]);
    $adm_contact = trim($_POST["adm_contact"]);
    $adm_role = trim($_POST["adm_role"]);
    $adm_password = trim($_POST["adm_password"]);

    $encrypt_password = md5($adm_password);
    Add_New_Admin($con, $adm_id, $adm_name, $adm_email, $adm_contact, $adm_role, $encrypt_password);
}
?>

<script src="../assets/js/jquery-3.6.0.min.js"></script>


<div class="page-content-wrapper">

    <div class="page-content">



        <main class="" style="color: #0F1035;">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <a href="ab-dashboard.php">
                    <div class="breadcrumb-item pe-3"
                        style="color:#ef00ffd1;font-size:25px;font-weight:400">Dashboard
                    </div>
                </a>
                <i class="fa-solid fa-chevron-right" style=""></i>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="admin_details.php">
                    <div class="breadcrumb-item pe-3"
                        style="color:#ef00ffd1;font-size:25px;font-weight:400">Admin
                    </div>
                </a>
                <i class="fa-solid fa-chevron-right" style=""></i>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <div class="breadcrumb-item active pe-3" style="color:#0000FF;border:none;font-size:25px">Add Admin
                </div>

                <!-- <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary"> <img
                                src="../assets/images/logo-icon-2.png" class="logo-icon" alt="logo icon"
                                style="height: 20px; width: 20px; color:#923EB9"> Hello
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
            <!-- <div class="my-3">
                <div class="col-md-12 text-left">
                    <h4>
                        <a style="text-decoration: none;color:#ef00ffd1" href="./ab-dashboard.php">Dashboard/</a>
                        <a style="text-decoration: none;color:#ef00ffd1" href="./admin_details.php">Admin/</a>
                        <span style="color: #0000FF;">Add-Admin</span>
                    </h4>
                </div>
            </div> -->
            <br>

            <div class="mb-3">
                <form action="./admin_details.php">
                    <div class="d-flex justify-content-end text-center">
                        <button type="submit" name="add_admin_btn" class="btn" style="
                            background:#3c096c;
                            color: #edf2f3;
                            font-weight: 500;">
                            <span class="me-2"><i class="fa-solid fa-arrow-left"></i></span> Back to Admin Details</button>
                    </div>
                </form>
            </div>

            <div class="text-center mt-2">
                <h2>Add Admin page</h2>
            </div>

            <div class="mt-5 mb-3 d-flex justify-content-center">
                <div class="card p-2"
                    style="width: 90%;">
                    <div class="container">
                        <form action="./add_admin.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Admin Name</label>
                                <input type="text" class="form-control" id="adm_name" name="adm_name"
                                    placeholder="Name:-" autocomplete="off" style="color: #0F1035;" required>
                                <span id="adm_name_error"
                                    style="color: red; text-align: center; font-weight: 600;"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Admin Email Address</label>
                                <input type="email" class="form-control" id="adm_email" name="adm_email"
                                    placeholder="Email:-" autocomplete="off" style="color: #0F1035;" required>
                                <span id="adm_email_error"
                                    style="color: red; text-align: center; font-weight: 600;"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Admin Contact No.</label>
                                <input type="tel" class="form-control" id="adm_contact" name="adm_contact"
                                    placeholder="Contact No:-" autocomplete="off" pattern="[0-9]*"
                                    style="color: #0F1035;" maxlength="10"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    required>
                                <span id="adm_contact_error"
                                    style="color: red; text-align: center; font-weight: 600;"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Admin Role</label>
                                <select name="adm_role" class="form-select form-select-md mb-3" require>
                                    <!-- <option value="default" selected>Select Admin Role</option > -->
                                    <option value="main">main</option>
                                    <option value="Approving Orders" selected>Approving Orders</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="adm_password" name="adm_password"
                                    placeholder="Password:-" minlength="8" style="color: #0F1035;" required>
                                <span id="adm_password_error"
                                    style="color: red; text-align: center; font-weight: 600;"></span>
                            </div>
                    </div>
                    <div class="d-flex justify-content-center mb-3 text-center">
                        <button type="submit" name="add_new_admin" id="add_new_admin" class="btn" style="width: 50%;
                            background: #3c096c;
                            color: #edf2f3;
                            font-weight: 500;">
                            Add New Admin</button>
                    </div>
                    </form>
                </div>
            </div>
            <script>
            function successMessage() {
                alert(
                    "Admin Added Successfully \n Now,You can see this new user in Admin Details Page"
                    ); // this is the message in ""
            }
            </script>
            <script>
            $(document).ready(function() {
                $("#adm_name").blur(function() {
                    $("#adm_name_error").hide();
                    namevalidation();
                });

                $("#adm_email").blur(function() {
                    $("#adm_email_error").hide();
                    emailvalidation2();
                });

                $("#adm_contact").blur(function() {
                    $("#adm_contact_error").hide();
                    contactvalidation();
                });


                $("#adm_password").blur(function() {
                    $("#adm_password_error").hide();
                    passwordvalidation();
                });
            });

            // Email validation for blur event
            function namevalidation() {
                var namespecialcharacter = /^[A-Za-z0-9]+$/
                if ($("#adm_name").val() == "") {
                    $("#adm_name").css("border", "2px solid red");
                    $("#adm_name_error").show();
                    $("#adm_name_error").html("Name can't be empty");
                    return false;
                } else if (!namespecialcharacter.test($("#adm_name").val())) {
                    $("#adm_name").css("border", "2px solid red");
                    $("#adm_name_error").show();
                    $("#adm_name_error").html("Name should not containe special characters");
                    return false;
                } else {
                    $("#adm_name").css("border", "none");
                    $("#adm_name_error").hide();
                    return true;
                }
            }


            function emailvalidation2() {

                var email = $("#adm_email").val();

                if (email == "") {
                    $("#adm_email").css("border", "2px solid red");
                    $("#adm_email_error").show();
                    $("#adm_email_error").html("Email id can't be empty");
                    return false;
                } else if (IsEmail(email) == false) {
                    $("#adm_email").css("border", "2px solid red");
                    $("#adm_email_error").show();
                    $("#adm_email_error").html("Email id is not in a proper formate");
                    return false;
                } else {
                    $("#adm_email").css("border", "none");
                    $("#adm_email_error").hide();
                    return true;
                }

                function IsEmail(email) {
                    const regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!regex.test(email)) {
                        return false;
                    } else {
                        return true;
                    }
                }
            }

            function contactvalidation() {

                contactnumberlength = $("#adm_contact").val();
                if ($("#adm_contact").val() == "") {
                    $("#adm_contact").css("border", "2px solid red");
                    $("#adm_contact_error").show();
                    $("#adm_contact_error").html("Contact should not be empty");
                    return false;
                } else if (contactnumberlength.length < 10) {
                    $("#adm_contact").css("border", "2px solid red");
                    $("#adm_contact_error").show();
                    $("#adm_contact_error").html("Contact number must containe 10 digits");
                    return false;
                } else {
                    $("#adm_contact").css("border", "none");
                    $("#adm_contact_error").hide();
                    return true;
                }
            }

            function passwordvalidation() {
                password = $("#adm_password").val();

                var specialcharacter = /^[A-Za-z0-9]+$/

                if ($("#adm_password").val() == "") {
                    $("#adm_password").css("border", "2px solid red");
                    $("#adm_password_error").show();
                    $("#adm_password_error").html("Password should not be empty");
                    return false;
                }

                if (password.length < 8) {
                    $("#adm_password").css("border", "2px solid red");
                    $("#adm_password_error").show();
                    $("#adm_password_error").html("Password containe minimum 8 characters");
                    return false;
                } else if (!password.match(/[A-Z]/)) {
                    $("#adm_password").css("border", "2px solid red");
                    $("#adm_password_error").show();
                    $("#adm_password_error").html("Password containe a capital letter");
                    return false;
                } else if (!password.match(/[0-9]/)) {
                    $("#adm_password").css("border", "2px solid red");
                    $("#adm_password_error").show();
                    $("#adm_password_error").html("Password containe a number");
                    return false;
                } else if (password.match(specialcharacter)) {
                    $("#adm_password").css("border", "2px solid red");
                    $("#adm_password_error").show();
                    $("#adm_password_error").html("Password containe a special character");
                    return false;
                } else {
                    $("#adm_password").css("border", "none");
                    $("#adm_password_error").hide();
                    return true;
                }
            }
            </script>
        </main>
    </div>


</div>

<?php
require 'footer.php';

?>