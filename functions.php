<?php

function Admin_Unique_id($conn)
{
    $random_number = strval(rand(1000, 9999));
    $id = "ADM20240" . $random_number;
    return $id;
}

function Advertiser_Unique_id($conn)
{
    $random_number = strval(rand(1000, 9999));
    $id = "AD20240" . $random_number;
    return $id;
}

function Publisher_Unique_id($conn)
{

    $random_number = strval(rand(1000, 9999));
    $id = "PB20240" . $random_number;
    return $id;
}

function Advertisement_Unique_id($conn)
{
    $random_number = strval(rand(1000, 9999));
    $id = "ADV20240" . $random_number;
    return $id;
}

function Subscription_Unique_id($conn)
{
    $random_number = strval(rand(1000, 9999));
    $id = "SB20240" . $random_number;
    return $id;
}








// function Publisher_Unique_id($conn)
// {
//     try {
//         $random_number = strval(rand(1000, 9999));
//         $id = "PB20240" . $random_number;

//         $sql = "select Adm_id from publisher_details where ID='$id'";
//         $stmt = $conn->prepare($sql);
//         $stmt->execute();

//         $stmt_result = $stmt->get_result();

//         if ($stmt_result->num_rows > 0) {
//             $random_number = strval(rand(1000, 9999));
//             $id = "ADM20240" . $random_number;
//             return $id;
//         }
//     } catch (\Throwable $th) {
//         echo "There May be some error occured in system please try again";
//     }
//     return $id;
// }