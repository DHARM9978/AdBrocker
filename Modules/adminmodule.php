<?php
// require '../Modules/AdminAPI.php';

function Get_Admin($adm_email, $adm_password)
{
    $param=["email"=>$adm_email,"password"=>$adm_password];
    $response=LoginRequest('https://admanager-s9eo.onrender.com/user/login',$param);

    $mydata = json_decode($response, true);
    // echo $mydata['contactNo'];
    
    if (array_key_exists('error_message', $mydata)){
        echo "<script>alert('$mydata[error_message]')</script>";
    }else{
        if ($mydata['email']) {
        
            $_SESSION["adm_email"] = $mydata['email'];
            $_SESSION["admin_name"] = $mydata['name'];
            $_SESSION["admin_contact"] = $mydata['contactNo'];
            $_SESSION["adminid"]=$mydata["_id"];
            $_SESSION["is_loggedin"] = true;

            header('Location:/AdBrocker_Admin/Pages/ab-dashboard.php');
            
        }else{
            // echo "<script>alert('$response');</script>";
            echo "<script>alert('$response.error_message')</script>";
        }
    
    }
}


function Add_New_Admin($adm_name, $adm_email, $adm_contact, $adm_role, $password){

    $param=["name"=>$adm_name,"email"=>$adm_email,"contactNo"=>$adm_contact,"role"=>$adm_role,"password"=>$password];
    $response=AddAdmin('https://admanager-s9eo.onrender.com/user/signup',$param);



    $mydata = json_decode($response, true);
 
    // echo "<script>alert('$mydata')</script>";
  
}

function perticular_admin($email){

$param=["email"=>$email];

// echo "<script>console.log('$email')</script>";

$response=Perticular_admin_API("https://admanager-s9eo.onrender.com/user/getby",$param);

// echo "<script>console.log('jOJE HO nUMUNA')</script>";
// echo "<script>console.log('$response');</script>";



$mydata = json_decode($response, true);

// echo "<script>alert('$response');</script>";
 

return $mydata;

}
?>