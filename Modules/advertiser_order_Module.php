<?php

function Total_Orders($con){
    $sql="select * from advertiser_order";
    $stmt=$con->prepare($sql);
    $stmt->execute();

    $stmt_result=$stmt->get_result();

    return $stmt_result;

}


function Approved_Order($con){

    $sql="select * from advertiser_order where order_status='confirm'";
    $stmt=$con->prepare($sql);
    $stmt->execute();

    $stmt_result=$stmt->get_result();

    return $stmt_result;

}

function Pending_Order($con){
    
    $sql="select * from advertiser_order where order_status='upcoming'";
    $stmt=$con->prepare($sql);
    $stmt->execute();

    $stmt_result=$stmt->get_result();

    return $stmt_result;
}

function Pending_to_Approve($id){

    $param=["id"=>$id,"status"=>"ongoing"];
    $response=UpdateAdvertiseAPI('https://admanager-s9eo.onrender.com/advertise',$param);

    $data=json_decode($response);
    print_r($data);
    $lastdata=print_r($param);
    echo $lastdata;
    
}
function delete_order($con,$id){

    $sql="delete from advertiser_order where adv_order_id='$id'";
    $stmt=$con->prepare($sql);
    $stmt->execute();

    // if($stmt->execute()){
    //     echo "<script>alert("Order Deleted Successfully");</script>";
    // }
}


?>