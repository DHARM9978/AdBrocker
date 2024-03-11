<?php
require 'base.php';
require '../config.php';
require '../Modules/adminmodule.php';

$con = Db_Connection();

if(isset($_REQUEST['btnchangepassword'])){

    $oldpassword=$_REQUEST['CurrentPassword'];
    $newpassword=$_REQUEST['NewPassword'];
    $encrypt_oldpassword=md5($oldpassword);
    $encrypt_newpassword=md5($newpassword);

    $Current_Admin=Perticular_Admin($con,$_SESSION['adm_email']);
    $Current_Admin_data=$Current_Admin->fetch_assoc();
    $Current_Admin_Password=$Current_Admin_data['adm_password'];
    $Current_Admin_Id=$Current_Admin_data['adm_id'];

   
    Change_Password($con,$Current_Admin_Id,$Current_Admin_Password,$encrypt_oldpassword,$encrypt_newpassword);

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
                        <form action="./change_password.php" method="post">
                            <h3 class="mb-3" align="center">Change Password</h3>
                            <br>
                            <br>
                            <br>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Current Password</label>
                                    <input type="text" class="form-control" value="" id="CurrentPassword"
                                        name="CurrentPassword" placeholder="Enter Current Password">
                                    <span name="currentpassword" id="currentpassword" style="color:red"></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">New Password</label>
                                    <input type="text" class="form-control" value="" id="NewPassword" name="NewPassword"
                                        placeholder="Enter New Password">
                                    <span name="newpassowrd" id="newpassword"></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">New Conform Password</label>
                                    <input type="text" class="form-control" value="" id="NewConformPassword"
                                        name="NewConformPassword" placeholder="Enter Conform Password">
                                    <span name="conformnewpassword" id="conformnewpassword"></span>
                                </div>

                            </div>
                            <br>
                            <div class="text-start mt-3">
                                <button type="submit" class="btn btn-primary px-4" style="margin-left:40%;background-color:#3c096c"
                                    id="btnchangepassword" name="btnchangepassword">Save
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
            $("#newpassowrd").hide();
            newpasswordvalidation();
        });


        $('#NewConformPassword').blur(function () {
            $("#conformnewpassword").hide();
            conformnewpasswordvalidation();
        });
    });

    function currnetpasswordvalidation() {
        var currentpassword = $("#CurrentPassword").val();

        if (currentpassword == "") {
            $("#currentpassword").show();
            $("#currentpassword").html("Password can't be Empty");
            return false;
        }
    }

    function newpasswordvalidation() {
        var newpassword = $("#NewPassword").val();

    }

    function conformnewpasswordvalidation() {
        var conformpassword = $("#NewConformPassword").val();

    }
</script>

</div>


<?php
require 'footer.php';

?>
<!--end wrapper-->

</div>
</div>
</body>

</html>