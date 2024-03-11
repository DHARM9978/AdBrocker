<?php

function Get_All_Advertisers($con)
{
    $sql = "select * from advertiser_details where is_deleted='0'";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $stmt_result = $stmt->get_result();

    return $stmt_result;
}

function Add_New_Advertiser($con, $adv_id, $adv_name, $adv_email, $adv_contact, $password)
{
    $sql = "insert into advertiser_details(adv_id,adv_name,adv_email,adv_contact,password) values('$adv_id','$adv_name','$adv_email','$adv_contact','$password');";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    if ($stmt != "") {
        echo "<script>alert('Advertiser Added Successfully , You can see new Advertiser in Advertiser Details Page');</script>";
    } else {
        echo "<script>alert('Something Went Wrong');</script>";
    }
}

function Remove_Advertiser($con, $adv_id)
{
    $sql="update advertiser_details set is_deleted=1 where adv_id='$adv_id'";
    $stmt = $con->prepare($sql);
    $stmt->execute();
}
