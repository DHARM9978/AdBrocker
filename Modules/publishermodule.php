<?php

function Get_All_Publishers($con)
{
    $sql = "select * from publisher_details where is_deleted='0'";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $stmt_result = $stmt->get_result();

    return $stmt_result;
}

function Add_New_Publisher($con, $pub_id, $pub_name, $pub_email, $pub_contact, $password)
{
    $sql = "insert into publisher_details(pub_id,pub_name,pub_email,pub_contact,password) values('$pub_id','$pub_name','$pub_email','$pub_contact','$password');";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    if ($stmt != "") {
        echo "<script>alert('Publisher Added Successfully , You can see new Publisher in Publisher Details Page');</script>";
    } else {
        echo "<script>alert('Something Went Wrong');</script>";
    }
}

function Remove_Publisher($con, $pub_id)
{
    // $sql = "delete from publisher_details where pub_id='$pub_id'";

    $sql="update publisher_details set is_deleted='1' where pub_id='$pub_id'";

    $stmt = $con->prepare($sql);
    $stmt->execute();
}
