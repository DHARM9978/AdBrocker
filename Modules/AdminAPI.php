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


return $response;
}




function AddAdmin($url, $data)
{
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
        $error= 'Curl error: ' . curl_error($ch);
        echo "<script>alert('$error')</script>";
    }

    
    $decoded =  json_encode($response, true); 
    // return $response;
    return $decoded;
}




function deleteAdmin($url,$data){

// Convert data to JSON format
$jsonData = json_encode($data);

// Initialize cURL session
$curl = curl_init($url);

// Set the request method to DELETE
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');

// Set the Content-Type header to application/json
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Set the JSON data to be sent
curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);

// Receive the response as a string
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($curl);


// echo "<script>console.log($response)</script>";
// Check for errors
if ($response === false) {
    // echo 'Error: ' . curl_error($curl);
    echo "<script>alert('Data can't be deleted');</script>";
} else {
    echo "<script>alert('Data Deleted Successfully')</script>";
    }



curl_close($curl);


}


function Perticular_admin_API($url,$data){
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
        $error= 'Curl error: ' . curl_error($ch);
        echo "<script>alert('$error')</script>";
    }

    
    $decoded =  json_encode($response, true); 
    // return $response;
    return $decoded;

}




?>