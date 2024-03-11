
<?php

function Total_Advertisers($con)
{
    $sql = "select * from advertiser_details;";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $all_Advertisers = $stmt->get_result();

    $number_of_advertisers = $all_Advertisers->num_rows;

    return $number_of_advertisers;
}

function Total_Publishers($con)
{
    $sql = "select * from publisher_details;";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $all_Publishers = $stmt->get_result();

    $number_of_publishers = $all_Publishers->num_rows;

    return $number_of_publishers;
}

function Total_Admins($con)
{
    $sql = "select * from admin_table;";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $all_Admins = $stmt->get_result();

    $number_of_admins = $all_Admins->num_rows;

    return $number_of_admins;
}

function Total_Advertisements($con)
{
    $sql = "select * from advertisement_info;";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $all_Advertisements = $stmt->get_result();

    $number_of_advertisements = $all_Advertisements->num_rows;

    return $number_of_advertisements;
}
