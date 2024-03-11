<?php

function Get_All_Advertisements($con)
{
    $sql = "select * from advertisement_info";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $stmt_result = $stmt->get_result();

    return $stmt_result;
}

function Remove_Advertisement($con, $ad_id)
{
    $sql = "delete from advertisement_info where ad_id='$ad_id'";

    $stmt = $con->prepare($sql);
    $stmt->execute();
    // if($stmt->execute()){
    //     echo "<script>alert("Record Deleted Successfully");</script>";
    // };
}

function Approve_Advertisement($con, $ad_id)
{
    $sql = "update advertisement_info set admin_approved=1 where ad_id='$ad_id'";

    $stmt = $con->prepare($sql);
    $stmt->execute();
}
