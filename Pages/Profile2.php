<?php


if ($_SESSION["is_loggedin"] == false) {
    header("Location:/AdBrocker_Admin/admin-login.php");
  }


// require 'base.php';  
require '../Modules/adminmodule.php';
require '../Modules/AdminAPI.php';
require '../Modules/ImageUploadAPI.php';



$email=$_SESSION['adm_email'];

$data2=perticular_admin($email);

$data = json_decode($data2, true);
// echo "<script>alert('$data2')</script>";

$id=$_SESSION["adminid"];

$imagedata=getimage("https://admanager-s9eo.onrender.com/images/getImage",$id);
echo "$imagedata";
echo '<img src="data:image/jpeg;base64,' . base64_encode($imagedata) . '" alt="Image">';

// echo "$imagedata";
// $image_data = base64_decode($imagedata);
// echo "$image_data";
// file_put_contents('image.jpg', $image_data);

// echo "<script>console.log('$imagedata')</script>";



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imageadding"])) {
    // Define a temporary directory to store the uploaded file
    $tempDir = "temp/";

    // Create the temporary directory if it doesn't exist
    if (!file_exists($tempDir)) {
        mkdir($tempDir, 0777, true); // Create the directory recursively with full permissions
    }

    // Generate a unique filename for the uploaded image
    $tempFile = $tempDir . $_FILES["imageadding"]["name"];
    echo $tempFile;

    // Move the uploaded file to the temporary directory
    if (move_uploaded_file($_FILES["imageadding"]["tmp_name"], $tempFile)) {
        // echo "Image uploaded successfully to: " . $tempFile;
    } else {
        echo "Error uploading image.";
    }
    $id=$_SESSION["adminid"];
   
    imageupload('https://admanager-s9eo.onrender.com/images/upload',$tempFile,$id);

    $name=$_REQUEST['txtname'];
    $contact=$_REQUEST['txtcontact'];
    $email=$_REQUEST['txtemail'];


    $url="https://admanager-s9eo.onrender.com/user/updateUser";
    $data=["userId"=>$id,"name"=>$name,"email"=>$email,"contactNo"=>$contact];
    updateProfile($url,$data);

}

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

                        <form method="post" enctype="multipart/form-data" action="Profile2.php">
                            <h5 class="mb-3"> Profile</h5>
                            <div class="mb-4 d-flex flex-column gap-3 align-items-center justify-content-center">
                                <div class="user-change-photo shadow">

                                    <img src="data:image/jpeg;base64,<?php echo $imagedata ?>" height="50px" width="50px"
                                        alt="No Image Inserted" alt="No Image Inserted" name="image" id="image"
                                        onerror="this.onerror=null; this.src='../assets/images/No_Image.jpg';">


                                    <!-- <img src="../assets/images/No_Image.jpg" name="image" id="image"> -->
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
                                    <input type="text" class="form-control" id="txtname" name="txtname"
                                    value="<?php echo $data['name']; ?>">
                                     
                                    <!-- <span style="coloe:red" name="spanname" id="spanname"></span> -->
                                </div>
                            </div>

                            <h5 class="mb-0 mt-4">Contact Information</h5>
                            <hr>
                            <div class="row g-3">
                                <div class="col-6">
                                    <label class="form-label">Contact NO</label>
                                    <input type="text" class="form-control" id="txtcontact" name="txtcontact"
                                    value="<?php echo $data['contactNo']; ?>">
                                    <span style="coloe:red" name="spancontact" id="spancontact"></span>
                                </div>
                            </div>
                            <br>
                            <div>
                                <div class="col-6">
                                    <label class="form-label">Email address</label>
                                    <input type="text" class="form-control" id="txtemail" name="txtemail"
                                    value="<?php echo $data['email']; ?>"  >
                                    <span style="coloe:red" name="spanemail " id="spanemail "></span>
                                </div>
                                <!-- <div class="col-12">
                                    <label class="form-label">About Me</label>
                                    <textarea class="form-control" rows="4" cols="4" placeholder="Describe yourself..."
                                        name="Description" id="Description"></textarea>
                                </div> -->
                            </div>
                            <div class="text-start mt-3">
                                <input type="submit" class="btn btn-primary px-4" id="btnsavechange"
                                    name="btnsavechange" value="Save Changes" />
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



<script>
let profilepic = document.getElementById("image");
let inputfile = document.getElementById("imageadding");

inputfile.onchange = function() {
    profilepic.src = URL.createObjectURL(inputfile.files[0]);
    // alert(profilepic.src);
}
</script>
<!-- 
<script>

$(document).ready(function(){

    $("#txtname").blur(function() {
        $("#spanname").hide();
        validatesubname();
    });

}) -->



</script>



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




</body>

</html>