<?php

if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");
  }



require 'base.php';
// require '../config.php';
// require '../Modules/adminmodule.php';

// $con = Db_Connection();

// if(isset($_REQUEST['btnchangepassword'])){

//     $oldpassword=$_REQUEST['CurrentPassword'];
//     $newpassword=$_REQUEST['NewPassword'];
//     $encrypt_oldpassword=md5($oldpassword);
//     $encrypt_newpassword=md5($newpassword);

//     $Current_Admin=Perticular_Admin($con,$_SESSION['adm_email']);
//     $Current_Admin_data=$Current_Admin->fetch_assoc();
//     $Current_Admin_Password=$Current_Admin_data['adm_password'];
//     $Current_Admin_Id=$Current_Admin_data['adm_id'];

   
//     Change_Password($con,$Current_Admin_Id,$Current_Admin_Password,$encrypt_oldpassword,$encrypt_newpassword);

// }

?>
<script src="../assets/js/jquery-3.6.0.min.js"></script>

<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card radius-10">
                    <div class="card-body">
                        <form action="./change_password.php" method="post">
                            <h3 class="mb-3" align="center">Change Password</h3>
                            <br>
                            <br>
                            <br>
                            <form action="####################" method="post">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" class="form-control" value="" id="CurrentPassword"
                                        name="CurrentPassword" placeholder="Enter Current Password" autocomplete=off>
                                    <span name="currentpassword" id="currentpassword"
                                        style="color:red;font-weight:600"></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" value="" id="NewPassword"
                                        name="NewPassword" placeholder="Enter New Password" autocomplete=off >
                                    <span name="newpassword" id="newpassword" style="color:red;font-weight:600"></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">New Conform Password</label>

                                    <input type="password" class="form-control" value="" id="NewConformPassword"
                                        name="NewConformPassword" placeholder="Enter Conform Password" autocomplete=off>
                                    <!-- <i class="fa-solid fa-eye"></i>
                                    <i class="fa-solid fa-eye-slash"></i> -->
                                    <span name="conformnewpassword" id="conformnewpassword"
                                        style="color:red;font-weight:600"></span>
                                </div>

                            </div>
</form>


                            <!-- <form action="##########" method="post" class="p-3">
                                <div class="form-group">
                                    <label>Old Password</label>
                                <input type="password" class="form-control">
                            </div>
                            </form> -->

                            <br>
                            <div class="text-start mt-3">
                                <button type="submit" class="btn btn-primary px-4"
                                    style="margin-left:40%;background-color:#3c096c" id="btnchangepassword"
                                    name="btnchangepassword">Save
                                    Changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!--end row-->

    </div>
    <!-- end page content-->
</div>


<!--start overlay-->
<div class="overlay nav-toggle-icon"></div>
<!--end overlay-->


<script>
    $(document).ready(function () {

        $('#CurrentPassword').blur(function () {
            $("#currentpassword").hide();
            currnetpasswordvalidation();
        });


        $('#NewPassword').blur(function () {
            $("#newpassword").hide();
            newpasswordvalidation();
            checkpassword();
        });

        $('#NewConformPassword').blur(function () {
            $("#conformnewpassword").hide();
            conformnewpasswordvalidation();
        });

    });

    function currnetpasswordvalidation() {
        var currentpassword = $("#CurrentPassword").val();
        var specialcharacter = /^[A-Za-z0-9]+$/

        if (currentpassword == "") {
            $("#currentpassword").show();
            $("#currentpassword").html("Password can't be Empty");
            return false;
        }

        if (currentpassword.length < 8) {
            $("#currentpassword").show();
            $("#currentpassword").html("Password containe minimum 8 characters");
            return false;
        }
        if (!currentpassword.match(/[A-Z]/)) {
            $("#currentpassword").show();
            $("#currentpassword").html("Password containe a capital letter");
            return false;
        }
        if (!currentpassword.match(/[0-9]/)) {
            $("#currentpassword").show();
            $("#currentpassword").html("Password containe a number");
            return false;
        }
        if (currentpassword.match(specialcharacter)) {
            $("#currentpassword").show();
            $("#currentpassword").html("Password containe a special character");
            return false;
        } else {
            $("#currentpassword").hide();
            return true;
        }

    }



    function newpasswordvalidation() {
        var newpassword = $("#NewPassword").val();
        var specialcharacter = /^[A-Za-z0-9]+$/

        if (newpassword == "") {
            $("#newpassword").show();
            $("#newpassword").html("Password can't be Empty");
            return false;
        }

        if (newpassword.length < 8) {
            $("#newpassword").show();
            $("#newpassword").html("Password containe minimum 8 characters");
            return false;
        }
        if (!newpassword.match(/[A-Z]/)) {
            $("#newpassword").show();
            $("#newpassword").html("Password containe a capital letter");
            return false;
        }
        if (!newpassword.match(/[0-9]/)) {
            $("#newpassword").show();
            $("#newpassword").html("Password containe a number");
            return false;
        }
        if (newpassword.match(specialcharacter)) {
            $("#newpassword").show();
            $("#newpassword").html("Password containe a special character");
            return false;
        } else {
            $("#newpassword").hide();
            return true;
        }
    }

    function conformnewpasswordvalidation() {
        var conformpassword = $("#NewConformPassword").val();
        var newpassword = $("#NewPassword").val();
        var specialcharacter = /^[A-Za-z0-9]+$/

        if (conformpassword == "") {
            $("#conformnewpassword").show();
            $("#conformnewpassword").html("Password can't be Empty");
            return false;
        }

        if (conformpassword !== newpassword) {
            $("#conformnewpassword").show();
            $("#conformnewpassword").html("Password and Conform Password must be same");
            return false;
        }

        if (conformpassword.length < 8) {
            $("#conformnewpassword").show();
            $("#conformnewpassword").html("Password containe minimum 8 characters");
            return false;
        }
        if (!conformpassword.match(/[A-Z]/)) {
            $("#conformnewpassword").show();
            $("#conformnewpassword").html("Password containe a capital letter");
            return false;
        }
        if (!conformpassword.match(/[0-9]/)) {
            $("#conformnewpassword").show();
            $("#conformnewpassword").html("Password containe a number");
            return false;
        }
        if (conformpassword.match(specialcharacter)) {
            $("#conformnewpassword").show();
            $("#conformnewpassword").html("Password containe a special character");
            return false;
        } else {
            $("#conformnewpassword").hide();
            return true;
        }

    }
</script>

<script>
    $(document).ready(function () {
        // Toggle password visibility
        $('#togglePassword').click(function () {
            var passwordInput = $('#password');
            var passwordFieldType = passwordInput.attr('type');

            if (passwordFieldType === 'password') {
                passwordInput.attr('type', 'text');
                $(this).text('Hide Password');
            } else {
                passwordInput.attr('type', 'password');
                $(this).text('Show Password');
            }
        });


    });
</script>

</div>


<!--end wrapper-->

</div>
</div>
</body>

</html>