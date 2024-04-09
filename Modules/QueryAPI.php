<?php

function GetAllQuery($url){
 
$url = $url;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response_json = curl_exec($ch);
curl_close($ch);

$response=json_decode($response_json, true);


return $response;
}

function GetPendingQuery($url){
   
$url = $url;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response_json = curl_exec($ch);
curl_close($ch);

$response=json_decode($response_json, true);


return $response;
}


function UpdateQuery($url,$data){
 
 // Convert data to JSON format
 $jsonData = json_encode($data);
    
 // Initialize cURL session
 $ch = curl_init($url);
 
 // Set cURL options
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
     'Content-Type: application/json',
     'Content-Length: ' . strlen($jsonData)
 ));
 
 // Execute cURL session and get the response
 $response = curl_exec($ch);
 
 // Check for cURL errors
 if (curl_errno($ch)) {
     echo 'Curl error: ' . curl_error($ch);
 }
 else{
    echo "<script>alert('Query Successfully Solved')</script>";
 }

 // $decoded =  json_encode($response, true); 
 return $response;

}



?>