<?php
function Get_All_Admins($con)
{
    $sql = "select * from admin_table where is_deleted=0";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $stmt_result = $stmt->get_result();

    return $stmt_result;
}

function Get_Admin($adm_email, $adm_password)
{
    $param=["email"=>$adm_email,"password"=>$adm_password];
    $response=LoginRequest('https://admanager-s9eo.onrender.com/user/login',$param);

    $mydata = json_decode($response, true);
    // echo $mydata['contactNo'];
    
    if ($mydata['email']) {
        $_SESSION["is_loggedin"] = true; 
        $_SESSION["adm_email"] = $mydata['email'];
        $_SESSION["admin_name"] = $mydata['name'];
        $_SESSION["admin_contact"] = $mydata['contactNo'];
      

        header('Location:/AdBrocker_Admin/Pages/ab-dashboard.php');
        
    }else{
        // echo "<script>alert('$response');</script>";
        echo $response;
    }


    // $sql = "select * from admin_table where adm_email='$adm_email'";
    // $stmt = $con->prepare($sql);
    // $stmt->execute();


    // $stmt_result = $stmt->get_result();

    // if ($stmt_result->num_rows > 0) {
    //     $data = $stmt_result->fetch_assoc();
        

    //     if ($data['adm_password'] === $adm_password) {
    //         $_SESSION["is_loggedin"] = true;
    //         $_SESSION["adm_email"] = $data['adm_email'];
    //         $_SESSION["admin_name"] = $data['adm_name'];
    //         header('Location:/AdBroker_AdminPanel/Pages/ab-dashboard.php');
    //     } else {
    //         echo "<script>alert('Invailed Password');</script>";
    //     }
    // } else {
        // echo "<script>alert('Invailed Email or Password');</script>";
    // }
    
}

function Admin_Data(){

}

function Add_New_Admin($con, $adm_id, $adm_name, $adm_email, $adm_contact, $adm_role, $password)
{
    $sql = "insert into admin_table(adm_id,adm_name,adm_email,adm_contact,adm_role,adm_password) values('$adm_id','$adm_name','$adm_email','$adm_contact','$adm_role','$password');";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    if ($stmt != "") {
        echo "<script>alert('Admin Added Successfully , You can see new Admin in Admin Details Page');</script>";
    } else {
        echo "<script>alert('Something Went Wrong');</script>";
    }
}

function Remove_Admin($con, $adm_id)
{
    // $sql = "delete from admin_table where adm_id='$adm_id'";
    $sql="update admin_table set is_deleted=1 where adm_id='$adm_id'";

    $stmt = $con->prepare($sql);
    $stmt->execute();
}

function Perticular_Admin($con,$email){
    $sql="select * from admin_table where adm_email='$email'";

    
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $stmt_result = $stmt->get_result();

    return $stmt_result;
}

function Change_Password($con,$id,$currentpassword,$oldpassword,$newpassword){

    if($currentpassword==$oldpassword){

        $sql="update admin_table set adm_password='$newpassword' where adm_id='$id'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        echo "<script>alert('Your Password is changed Successfully.');</script>";
        // header("Location:/AdBroker_AdminPanel/admin-login.php");
    }
    else{
        echo "<script>alert('Your Current Password is Wrong.');</script>";
    }
}


