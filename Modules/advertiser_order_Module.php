<?php


function Pending_to_Approve($id){

    $param=["_id"=>$id,"status"=>"ongoing","approve"=>"true"];
    $response=UpdateAdvertiseAPI('https://admanager-s9eo.onrender.com/advertise/state',$param);

if($response===false){
    echo "<script>alert('Data Can't be Updated');</script>";
}else{
    echo "<script>alert('Status updated Successfully')</script>";
    header('Location:/AdBrocker_Admin/Pages/ab-dashboard.php');
}
    
}

function Delete_Order($id){ 

    $param=["_id"=>$id,"status"=>"history"];
    $response=UpdateAdvertiseAPI('https://admanager-s9eo.onrender.com/advertise/state',$param);

    

    if($response===false){
        echo "<script>alert('Data Can't be Updated');</script>";
    }else{
        echo "<script>alert('Status updated Successfully')</script>";
        header('Location:/AdBrocker_Admin/Pages/ab-dashboard.php');
    }

}


?>