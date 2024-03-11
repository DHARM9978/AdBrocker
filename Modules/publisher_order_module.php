<?php

function All_Publisher_Order($con){
    $sql="select * from publisher_order";
    $stmt=$con->prepare($sql);
    $stmt->execute();

    $stmt_result=$stmt->get_result();

    return $stmt_result;
}

function All_Pending_Order($con){
    $sql="select * from publisher_order where ads_availability='0'";
    $stmt=$con->prepare($sql);
    $stmt->execute();

    $stmt_result=$stmt->get_result();

    return $stmt_result;
}

function All_Approved_Order($con){
    $sql="select * from publisher_order where ads_availability='1'";
    $stmt=$con->prepare($sql);
    $stmt->execute();

    $stmt_result=$stmt->get_result();

    return $stmt_result;
}



function Pending_to_Approve($con,$id){

    $sql="update publisher_order set admin_approval = 1 where pub_order_id= '$id'";
     
    $stmt=$con->prepare($sql);
    // $stmt->execute();
   
    // echo "<script>alert('Advertise is Approved')</script>";
    if($stmt->execute())
    {
        echo "<script>alert('Advertise is Approved')</script>";
    }

    
}

function delete_order($con,$id){

    $sql="delete from publisher_order where pub_order_id='$id'";
    $stmt=$con->prepare($sql);
    // $stmt->execute();

    // if($stmt->execute()){
    //     echo "<script>alert("Order Deleted Successfully");</script>";
    // }
}


?>