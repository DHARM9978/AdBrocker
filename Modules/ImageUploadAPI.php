<?Php


function imageupload($url,$tempFile,$id){
    
    
// File to upload
$file_path = $tempFile;

// API endpoint
$upload_url = $url;

// User ID
$user_id = $id;

// Initialize cURL
$curl = curl_init();

// Set cURL options
curl_setopt($curl, CURLOPT_URL, $upload_url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, [
    'image' => new CURLFile($file_path,'image/jpeg'), // This is how you upload files with cURL in PHP
]);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    "userid: $user_id",
]);

// Execute cURL request
$response = curl_exec($curl);

// Check for errors
if ($response === false) {
    $error_message = curl_error($curl);
    // Handle error
    echo "cURL error: $error_message";
} else {
    // Handle successful response
    echo "Upload successful: $response";
}

// Close cURL
curl_close($curl);

}



function updateProfile($url,$data){
 

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
     echo "<script>alert('Data Can't updated')</script>";
 }else{
    echo "<script>alert('Data Upadted Successfully')</script>";
 }

 
 // $decoded =  json_encode($response, true); 
 return $response;

}

?>