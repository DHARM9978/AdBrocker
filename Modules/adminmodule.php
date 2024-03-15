<?php

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
        echo "<script>alert('$response')</script>";
    }
    
}


function Add_New_Admin($adm_name, $adm_email, $adm_contact, $adm_role, $password){

    $param=["name"=>$adm_name,"email"=>$adm_email,"contactNo"=>$adm_contact,"role"=>$adm_role,"password"=>$password];
    $response=AddAdmin('https://admanager-s9eo.onrender.com/user/signup',$param);



    $mydata = json_decode($response, true);
 
    echo "<script>alert('$mydata')</script>";
  
}


?>