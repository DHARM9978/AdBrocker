<?php

function Add_New_Subscription($name,$price,$views,$type){

// try {
    $param=["name"=>$name,"views"=>$views,"price"=>$price,"type"=>$type,"status"=>"Active"];
    $response=AddSubscription('https://admanager-s9eo.onrender.com/plans',$param);
    
    
    $mydata = json_decode($response, true);
    
// } catch (Exception $th) {
//     echo "<script>console.log('Oops error occured ... $th');</script>";
// }
}

?>