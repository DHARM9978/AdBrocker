<?php

require 'base.php';
require '../Modules/adminmodule.php';
require '../Modules/AdminAPI.php';


$email=$_SESSION['adm_email'];

$data2=perticular_admin($email);


$data = json_decode($data2, true);

// $name=$data['name'];
// echo "<script>console.log('$name')</script>";



?>




<!-- start page content wrapper-->
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">



        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <a href="ab-dashboard.php">
                <div class="breadcrumb-item pe-3" style="color:#ef00ffd1;font-size:25px;font-weight:500;">Dashboard
                </div>
            </a>

            <i class="fa-solid fa-chevron-right" style=""></i>
            &nbsp;&nbsp;
            &nbsp;&nbsp;

            <a href="Profile.php">
                <div class="breadcrumb-item pe-3" style="color:#ef00ffd1;font-size:25px;font-weight:500;">Profile
                </div>
            </a>


            <!-- <i class="fa-solid fa-arrow-right" style="font-size:20px;"></i> -->
            <i class="fa-solid fa-chevron-right" style=""></i>
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            <div class="breadcrumb-title active pe-3" style="color:#0000FF;border:none;font-size:25px">Edit Profile
            </div>


        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card radius-10">
                    <div class="card-body">

                        <form>
                            <h5 class="mb-3"> Profile</h5>
                            <div class="mb-4 d-flex flex-column gap-3 align-items-center justify-content-center">
                                <div class="user-change-photo shadow">
                                    <img src="<?php echo $row['image'] ?>" height="50px" width="50px"
                                        alt="No Image Inserted" alt="No Image Inserted" name="image" id="image"
                                        onerror="this.onerror=null; this.src='../assets/images/No_Image.jpg';">
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm radius-30 px-4">
                                    <i class="fa-regular fa-image"></i> <label for="imageadding">Change Photo</label>
                                </button>
                                <input type="file" id="imageadding" name="imageadding" style="display:none">
                            </div>
                            <h5 class="mb-0 mt-4">User Information</h5>
                            <hr>
                            <div class="row g-3">
                                <div class="col-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" value="<?php echo $data['name'] ?>">
                                </div>
                                <!-- <div class="col-6">
        <label class="form-label">Email address</label>
        <input type="text" class="form-control" value="<?php echo $data['email'] ?>">
      </div> -->

                            </div>

                            <h5 class="mb-0 mt-4">Contact Information</h5>
                            <hr>
                            <div class="row g-3">
                                <!-- <div class="col-12">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" value="">
      </div> -->
                                <div class="col-6">
                                    <label class="form-label">Contact NO</label>
                                    <input type="text" class="form-control" value="<?php echo $data['contactNo'] ?>">
                                </div>
                            </div>
                            <br>
                            <div>
                                <div class="col-6">
                                    <label class="form-label">Email address</label>
                                    <input type="text" class="form-control" value="<?php echo $data['email'] ?>">
                                </div>
                                <!-- <div class="col-6">
        <label class="form-label">Country</label>
        <input type="text" class="form-control" value="">
      </div>
      <div class="col-6">
        <label class="form-label">Pin Code</label>
        <input type="text" class="form-control" value="">
      </div>
      <div class="col-6">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" value="">
      </div>
      <div class="col-12">
        <label class="form-label">About Me</label>
        <textarea class="form-control" rows="4" cols="4" placeholder="Describe yourself..."></textarea>
      </div> -->
                            </div>
                            <!-- <div class="text-start mt-3">
                                <button type="button" class="btn btn-primary px-4">Save Changes</button>
                            </div> -->
                    </div>
                    </form>





                </div>
            </div>
        </div>
        <!--end row-->

    </div>
    <!-- end page content-->
</div>



<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top">
    <ion-icon name="arrow-up-outline"></ion-icon>
</a>
<!--End Back To Top Button-->




<!--start overlay-->
<div class="overlay nav-toggle-icon"></div>
<!--end overlay-->

</div>
<!--end wrapper-->





<!-- JS Files-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<!--plugins-->
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

<!-- Main JS-->
<script src="assets/js/main.js"></script>


<script>
function getImage(imagename) {

    var newimage = imagename.replace(/^.*\\/, "");
    $("#getImage").html(newimage);

    let profileimage = document.getElementById('profileimage');
    let inputfile = document.getElementById('profileimg');

    inputfile.onchange = function() {
        profileimage.src = URL.createObjectURL(inputfile.files[0]);
    }

}
</script>



</body>

</html>