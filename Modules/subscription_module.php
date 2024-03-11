<?php

function Get_All_Subscriptions($con)
{
    $sql = "select * from subscription_table";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $stmt_result = $stmt->get_result();

    return $stmt_result;
}

function Add_New_Subscription($con, $subcription_id, $price, $duration, $no_of_days, $traffic_strength)
{
    
    $sql = "insert into subscription_table(subscription_id,price,duration,no_of_days,traffic_strength) values('$subcription_id','$price','$duration','$no_of_days','$traffic_strength');";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    if ($stmt != "") {
        echo "<script>alert('Subscription Added Successfully , You can see new Subscription in Subscription Details Page');</script>";
    } else {
        echo "<script>alert('Something Went Wrong');</script>";
    }
}

function Remove_Subscription($con, $subscription_id)
{
    $sql = "delete from subscription_table where subscription_id='$subscription_id'";

    $stmt = $con->prepare($sql);
    $stmt->execute();
}
