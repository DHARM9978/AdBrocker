<?php

function totalAdminAPI($url)
{


$url = $url;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response_json = curl_exec($ch);
curl_close($ch);

$response=json_decode($response_json, true);

// echo ($response_json);
// echo implode(",",$response); 
// echo $response;

return $response;
}
?>