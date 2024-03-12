<?php
  if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");

require 'base.php';
require '../config.php';
require '../Modules/advertisermodule.php';
require '../functions.php';


$con = Db_Connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $encrypt_password = "";
    $adv_id = Advertiser_Unique_id($con);

    $adv_name = trim($_POST["adv_name"]);
    $adv_email = trim($_POST["adv_email"]);
    $adv_contact = trim($_POST["adv_contact"]);
    $adv_password = trim($_POST["adv_password"]);

    $encrypt_password = md5($adv_password);
    Add_New_Advertiser($con, $adv_id, $adv_name, $adv_email, $adv_contact, $encrypt_password);
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

            <i class="fa-solid fa-chevron-right" style=""></i>
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            <a href="advertiser_details.php">
                <div class="breadcrumb-item pe-3" style="color:#ef00ffd1;font-size:25px;font-weight:500;">Advertiser
                </div>
            </a>
            <i class="fa-solid fa-chevron-right" style=""></i>
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            <div class="breadcrumb-title active pe-3" style="color:#0000FF;border:none;font-size:25px">Add Advertiser
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
                            href="javascript:;">Profile</a>
                        <a class="dropdown-item" href="../logout.php">Logout</a>

                    </div>
                </div>
            </div> -->
        </div>

        <main class=" " style="color: #0F1035;">


            <div class="">
                <form action="./advertiser_details.php">
                    <br>
                    <div class="d-flex justify-content-end text-center">
                        <button type="submit" name="add_advertiser_btn" class="btn" style="
                            background: #3c096c;
                            color: #edf2f3;
                            font-weight: 500;">
                            <span class=""><i class="fa-solid fa-arrow-left"></i></span> Back to Advertiser
                            Details</button>


                    </div>
                </form>
            </div>

            <div class="text-center mt-2">
                <h2>Add Advertisers page</h2>
            </div>

            <div class="mt-5 mb-3 d-flex justify-content-center">
                <div class="card p-2" style="width: 90%;">
                    <div class="container">
                        <form action="./add_advertiser.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Advertiser Name</label>
                                <input type="text" class="form-control" id="adv_name" name="adv_name"
                                    placeholder="Name:-" autocomplete="off" style="color: #0F1035;" required>
                                <span id="adv_name_error"
                                    style="color: red; text-align: center; font-weight: 600;"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Advertiser Email Address</label>
                                <input type="email" class="form-control" id="adv_email" name="adv_email"
                                    placeholder="Email:-" autocomplete="off" style="color: #0F1035;" required>
                                <span id="adv_email_error"
                                    style="color: red; text-align: center; font-weight: 600;"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Advertiser Contact No.</label>
                                <input type="tel" class="form-control" id="adv_contact" name="adv_contact"
                                    placeholder="Contact No:-" autocomplete="off" pattern="[0-9]*"
                                    style="color: #0F1035;" maxlength="10"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    required>
                                <span id="adv_contact_error"
                                    style="color: red; text-align: center; font-weight: 600;"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="adv_password" name="adv_password"
                                    placeholder="Password:-" autocomplete="off" minlength="8" style="color: #0F1035;"
                                    required>
                                <span id="adv_password_error"
                                    style="color: red; text-align: center; font-weight: 600;"></span>
                            </div>
                    </div>
                    <div class="d-flex justify-content-center mb-3 text-center">
                        <button type="submit" name="add_new_advertiser" class="btn" style="width: 50%;
                            background: #3c096c;
                            color: #edf2f3;
                            font-weight: 500;">
                            Add New Advertiser</button>
                    </div>
                    </form>
                </div>
            </div>


            <script>
            $(document).ready(function() {
                $("#adv_name").blur(function() {
                    $("adv_name_error").hide();
                    advnamevalidation();
                });

                $("#adv_email").blur(function() {
                    $("adv_email_error").hide();
                    advemailvalidation();
                });

                $("#adv_contact").blur(function() {
                    $("adv_contact_error").hide();
                    advcontactvalidation();
                });

                $("#adv_password").blur(function() {
                    $("adv_password_error").hide();
                    advpasswordvalidation();
                });
            });
            //Name Validation
            function advnamevalidation() {

                var namespecialcharacter = /^[A-Za-z0-9]+$/
                if ($("#adv_name").val() == "") {
                    $("#adv_name").css("border", "2px solid red");
                    $("#adv_name_error").show();
                    $("#adv_name_error").html("Name field can't be empty");
                    return false;
                } else if (!namespecialcharacter.test($("#adv_name").val())) {
                    $("#adv_name").css("border", "2px solid red");
                    $("#adv_name_error").show();
                    $("#adv_name_error").html("Name should not containe special characters");
                    return false;
                } else {
                    $("#adv_name").css("border", "none");
                    $("#adv_name_error").hide();
                    return true;
                }
            }
            //Email Validation
            function advemailvalidation() {

                var email = $("#adv_email").val();

                if (email == "") {
                    $("#adv_email").css("border", "2px solid red");
                    $("#adv_email_error").show();
                    $("#adv_email_error").html("Email id can't be empty");
                    return false;
                } else if (IsEmail(email) == false) {
                    $("#adv_email").css("border", "2px solid red");
                    $("#adv_email_error").show();
                    $("#adv_email_error").html("Email id is not in a proper formate");
                    return false;
                } else {
                    $("#adv_email").css("border", "none");
                    $("#adv_email_error ").hide();
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

            //Contact Validation
            function advcontactvalidation() {

                contactnumberlength = $("#adv_contact").val();
                if ($("#adv_contact").val() == "") {
                    $("#adv_contact").css("border", "2px solid red");
                    $("#adv_contact_error").show();
                    $("#adv_contact_error").html("Contact should not be empty");
                    return false;
                } else if (contactnumberlength.length < 10) {
                    $("#adv_contact").css("border", "2px solid red");
                    $("#adv_contact_error").show();
                    $("#adv_contact_error").html("Contact number must containe 10 digits");
                    return false;
                } else {
                    $("#adv_contact").css("border", "none");
                    $("#adv_contact_error").hide();
                    return true;
                }
            }


            //Password Validation
            function advpasswordvalidation() {

                password = $("#adv_password").val();

                var specialcharacter = /^[A-Za-z0-9]+$/

                if ($("#adv_password").val() == "") {
                    $("#adv_password").css("border", "2px solid red");
                    $("#adv_password_error").show();
                    $("#adv_password_error").html("Password should not be empty");
                    return false;
                }


                if (password.length < 8) {
                    $("#adv_password").css("border", "2px solid red");
                    $("#adv_password_error").show();
                    $("#adv_password_error").html("Password containe minimum 8 characters");
                    return false;
                } else if (!password.match(/[A-Z]/)) {
                    $("#adv_password").css("border", "2px solid red");
                    $("#adv_password_error").show();
                    $("#adv_password_error").html("Password containe a capital letter");
                    return false;
                } else if (!password.match(/[0-9]/)) {
                    $("#adv_password").css("border", "2px solid red");
                    $("#adv_password_error").show();
                    $("#adv_password_error").html("Password containe a number");
                    return false;
                } else if (password.match(specialcharacter)) {
                    $("#adv_password").css("border", "2px solid red");
                    $("#adv_password_error").show();
                    $("#adv_password_error").html("Password containe a special character");
                    return false;
                } else {
                    $("#adv_password").css("border", "none");
                    $("#adv_password_error").hide();
                    return true;
                }

            }
            </script>


        </main>
    </div>
</div>
</div>



</div>
</div>