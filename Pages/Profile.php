<?php
if ($_SESSION["is_loggedin"] == false) {
  header("Location:/AdBroker_AdminPanel/admin-login.php");
}

require 'base.php';
require '../config.php';
require '../Modules/adminmodule.php';

$con = Db_Connection();
$admemail=$_SESSION['adm_email'];
$Admindata=Perticular_Admin($con,$admemail);
$finaladmindata=$Admindata->fetch_assoc();




if(isset($_REQUEST['btnupdateimage'])){
    if($_FILES['chooseimage']['error']===4){
        echo "<script>alert('Image Not Found');</script>";
    }
    else{
        $filename=$_FILES['chooseimage']['name'];
        $filesize=$_FILES['chooseimage']['size'];
        $tempname=$_FILES['chooseimage']['tmp_name'];

        $validimageextention=['jpg','jpeg','png'];
        $imageextention=explode('.',$filename);
        $imageextention=strtolower(end($imageextention));

        if(!in_array($imageextention,$validimageextention)){
            echo "<script>alert('Invalid Image Extention');</script>";
        }
        else if($filesize>10000000){
            echo "<script>alert('Image Is Too Large');</script>";
        }
        else{
            $newimagename=uniqid();
            $newimagename=$newimagename.'.'.$imageextention;
            $admemail=$_SESSION['adm_email'];

            move_uploaded_file($tempname,'../ProfileImages/'.$newimagename);
            $query="update admin_table set adm_image = '$newimagename' where adm_email='$admemail'";
            mysqli_query($con,$query);
            echo "<script> alert('Image Uploaded Successfully');</script>";
        }
    }
}
?>


<!-- start page content wrapper-->
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">


    
 

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

            <a href="ab-dashboard.php">
                <div class="breadcrumb-item pe-3" style="color:#ef00ffd1;font-size:25px;font-weight:500;">Dashboard
                </div>
            </a>
            

            <!-- <i class="fa-solid fa-arrow-right" style="font-size:20px;"></i> -->
            <i class="fa-solid fa-chevron-right" style=""></i>
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            <div class="breadcrumb-title active pe-3" style="color:#0000FF;border:none;font-size:25px">Profile</div>



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
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-12 col-lg-8 col-xl-9">
                <div class="card overflow-hidden radius-10">
                    <div class="profile-cover bg-dark position-relative mb-4">
                        <div class="user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x">



                            <!-- <form action="Profile.php" method="post" enctype="multipart/form-data" autocomplete="off">
                                <label for="image">
                                    <img src="../assets/images/Default_Image.png" id="profileimage"
                                        style="height: 150px; width: 150px;">
                                </label>
                                <input type="file" id="profileimg" style="display: none; visibility: none; "
                                    onchange=getImage(this.value);>

                                <button class="btn btn-success" type="submit" id="btnpicupdate" name="btnpicupdate"
                                    style="margin-left: 30px; margin-top: 50px; margin-bottom: 10px; background-color: #923eb9 ;">Update
                                    Pic</button>
                            </form> -->


                            <form action="Profile.php" method="post" enctype="multipart/form-data" autocomplete="off">
                                <label for="chooseimage">
                                    <!-- <img src="../assets/images/Default_Image.png"> -->
                                    <img src="../ProfileImages/<?php echo $finaladmindata['adm_image'] ?>"  style="height:150px;width:150px"> 
                                </label>
                                

                                <input type="file" id="chooseimage" name="chooseimage" accept=".jpg, .jpeg, .png"
                                    value="" style="display:none">
                                <br>
                                <br>

                                <button class="btn btn-success" type="submit" id="btnupdateimage" name="btnupdateimage"
                                    style="background-color:#3c096c;margin-left:10px;margin-top:20px">Update
                                    Image</button>
                            </form>


                        </div>
                    </div>

                    <div class="card-body">

                        <div class="mt-5 d-flex align-items-start justify-content-between">

                            <div class="">
                                <!-- <button class="btn btn-success" style="margin-left: 40px; margin-top: 10px; margin-bottom: 10px; background-color: #923eb9 ;">Update Pic</button> -->
                                <!-- <h3 class="mb-2">Jhon Deo</h3>
                                <p class="mb-1">Engineer at BB Agency Industry</p>
                                <p>New York, United States</p>
                                <div class="">
                                    <span class="badge rounded-pill bg-primary">UX Research</span>
                                    <span class="badge rounded-pill bg-primary">CX Strategy</span>
                                    <span class="badge rounded-pill bg-primary">Project Management</span>
                                </div> -->
                                <!-- <button class="btn" style="background-color:#923eb9; color:white" type="submuit" name="submit">Change Image</button>
                                <input type="file" name="image" id="image" accept=".jeg,.jpeg,.png," value="" style="display:none" onchange=getImage(this.value);> -->
                            </div>
                            <div class="">
                                <!-- <button class="btn" style="background-color:#923eb9; color:white" type="submuit" name="submit">Change Image</button>
                                <input type="file" name="image" id="image" accept=".jeg,.jpeg,.png," value="" style="display:none" onchange=getImage(this.value);> -->
                                <h3 class="mb-2"><?php echo ucwords($_SESSION['admin_name']) ?></h3>
                                <!-- ucwords()  is used to change first letter in capital -->
                                <p class="mb-1">Engineer at BB Agency Industry</p>
                                <p>New York, United States</p>
                                <div class="">
                                    <span class="badge rounded-pill bg-primary">UX Research</span>
                                    <span class="badge rounded-pill bg-primary">CX Strategy</span>
                                    <span class="badge rounded-pill bg-primary">Project Management</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">About Me</h4>
                        <p class="">It is a long established fact that a reader will be distracted by the readable
                            content of a page
                            when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                            normal
                            distribution of letters.</p>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical
                            Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin
                            professor at
                            Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                            consectetur, from a
                            Lorem Ipsum passage, and going through the cites of the word in classical literature,
                            discovered the
                            undoubtable source.</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when
                            looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                            distribution of
                            letters</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xl-3">
                <div class="card radius-10">
                    <div class="card-body">
                        <h5 class="mb-3">Location</h5>
                        <p class="mb-0">
                            <ion-icon name="compass-sharp" class="me-2"></ion-icon>Kalkio Network
                        </p>
                    </div>
                </div>

                <div class="card radius-10">
                    <div class="card-body">
                        <h5 class="mb-3">Connect</h5>
                        <p class="">
                            <ion-icon name="globe-sharp" class="me-2"></ion-icon>www.example.com
                        </p>
                        <p class="">
                            <ion-icon name="logo-facebook" class="me-2"></ion-icon>Facebook
                        </p>
                        <p class="">
                            <ion-icon name="logo-twitter" class="me-2"></ion-icon>Twitter
                        </p>
                        <p class="mb-0">
                            <ion-icon name="logo-linkedin" class="me-2"></ion-icon>LinkedIn
                        </p>
                    </div>
                </div>

                <div class="card radius-10">
                    <div class="card-body">
                        <h5 class="mb-3">Skills</h5>
                        <div class="mb-3">
                            <p class="mb-1">Web Design</p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 45%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="mb-1">HTML5</p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 55%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="mb-1">PHP7</p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 65%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="mb-1">CSS3</p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <p class="mb-1">Photoshop</p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 85%"></div>
                            </div>
                        </div>

                    </div>
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

<?php
require 'footer.php';
?>
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