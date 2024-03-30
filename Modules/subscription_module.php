<?php

function Add_New_Subscription($name,$price,$views,$type){

$param=["name"=>$name,"views"=>$views,"price"=>$price,"type"=>$type,"status"=>"Active"];
$response=AddSubscription('https://admanager-s9eo.onrender.com/plans',$param);


$mydata = json_decode($response, true);  
$Final = json_decode($mydata, true);  

$error=$Final['error_message'];


echo "<script>alert('$error')</script>";


}

?>