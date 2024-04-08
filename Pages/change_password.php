<?php

if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");
  }



require 'base.php';
require '../Modules/ChangePasswordAPI.php';





if(isset($_REQUEST['btnchangepassword'])){
    $id=$_SESSION["adminid"];
    $oldpassword=$_REQUEST['CurrentPassword'];
    $newpassword=$_REQUEST['NewPassword'];

    $data=["userId"=>$id,"currentPassword"=>$oldpassword,"newPassword"=>$newpassword];
    $response=ChangePassword("https://admanager-s9eo.onrender.com/user/updatePassword",$data);

    // $finalresponse=json_decode($response);
    // $finalresponse2=$finalresponse['message'];

    echo "<script>alert('$response');</script>";
}


?>
<script src="../assets/js/jquery-3.6.0.min.js"></script>


<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card radius-10">
                    <div class="card-body">
                        <form action="change_password.php" method="post">
                            <h3 class="mb-3" align="center">Change Password</h3>
                            <br>
                            <br>
                            <br>
                            <form action="change_password.php" method="post">
                                <div class="row g-3">

                                    <div class="col-12">
                                        <label class="form-label">Current Password</label>
                                        <div class="form-group input-group">
                                            <input type="password" class="form-control" value="" id="CurrentPassword"
                                                name="CurrentPassword" placeholder="Enter Current Password"
                                                autocomplete=off required>
                                            <div class="input-group-prepended">
                                                <div class="input-group-text">
                                                    <a href="#" id="icon-click" name="icon-click">
                                                        <i class="fa-solid fa-eye" id="icon" name="icon">
                                                        </i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <br> -->
                                        <span name="currentpassword" id="currentpassword"
                                            style="color:red;font-weight:600"></span>
                                        <!-- </div> -->
                                    </div>

                                    <br>

                                    <div class="col-12">
                                        <label class="form-label">New Password</label>
                                        <div class="form-group input-group">
                                            <input type="password" class="form-control" value="" id="NewPassword"
                                                name="NewPassword" placeholder="Enter New Password" autocomplete=off
                                                required>

                                            <div class="input-group-prepended">
                                                <div class="input-group-text">
                                                    <a href="#" id="icon-click2" name="icon-click2">
                                                        <i class="fa-solid fa-eye" id="icon2" name="icon2"> </i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <span name="newpassword" id="newpassword"
                                            style="color:red;font-weight:600"></span>
                                    </div>

                                    <br>
                                    <div class="col-12">
                                        <label class="form-label">New Conform Password</label>
                                        <div class="form-group input-group">
                                            <input type="password" class="form-control" value="" id="NewConformPassword"
                                                name="NewConformPassword" placeholder="Enter Conform Password"
                                                autocomplete=off required>

                                            <div class="input-group-prepended">
                                                <div class="input-group-text">
                                                    <a href="#" id="icon-click3" name="icon-click3">
                                                        <i class="fa-solid fa-eye" id="icon3" name="icon3"> </i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <span name="conformnewpassword" id="conformnewpassword"
                                            style="color:red;font-weight:600"></span>
                                    </div>

                                </div>


                                <br>
                                <div class="text-start mt-3">
                                    <input type="submit" class="btn btn-primary px-4"
                                        style="margin-left:40%;background-color:#3c096c" id="btnchangepassword"
                                        name="btnchangepassword" value="Save Changes">
                                </div>
                            </form>
                            <br>
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
$(document).ready(function() {

    $('#CurrentPassword').blur(function() {
        $("#currentpassword").hide();
        currnetpasswordvalidation();
    });


    $('#NewPassword').blur(function() {
        $("#newpassword").hide();
        newpasswordvalidation();
        checkpassword();
    });

    $('#NewConformPassword').blur(function() {
        $("#conformnewpassword").hide();
        conformnewpasswordvalidation();
    });

    $("#btnchangepassword").click(function(){
        return currnetpasswordvalidation() &&  checkpassword() &&  conformnewpasswordvalidation();
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
$(document).ready(function() {


    $("#icon-click").click(function() {

        $("#icon").toggleClass("fa-solid fa-eye-slash");
        var eyeIcon = document.getElementById("icon");

        var input = $("#CurrentPassword");
        if (input.attr("type") == "password") {
            input.attr("type", "text");
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");

        } else {
            input.attr("type", "password");
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }

    });

    $("#icon-click2").click(function() {

        // $("#icon2").toggleClass("fa-solid fa-eye-slash");
        var eyeIcon = document.getElementById("icon2");

        var input = $("#NewPassword");
        if (input.attr("type") == "password") {
            input.attr("type", "text");
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            input.attr("type", "password");
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    });

    $("#icon-click3").click(function() {

        $("#icon3").toggleClass("fa-solid fa-eye-slash");
        var eyeIcon = document.getElementById("icon3");

        var input = $("#NewConformPassword");
        if (input.attr("type") == "password") {
            input.attr("type", "text");
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");

        } else {
            input.attr("type", "password");
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
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