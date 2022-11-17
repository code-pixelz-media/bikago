<?php
include($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

$handle = curl_init();

$url = "https://api.flexiroam.com/user/login/v1";
$user = get_option('flexiroam_email');
$password = base64_decode( get_option('flexiroam_password') );

$postData = array(
  'email' => $user,
  'password'  => $password,
  'submit'    => 'ok'
); 

curl_setopt_array($handle,
    array(
        CURLOPT_URL => $url,
        // Enable the post response.
        CURLOPT_POST   => true,
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_RETURNTRANSFER => true,
    )
);

$data = curl_exec($handle);

curl_close($handle);

//echo $data;
$myres = json_decode( $data );
$token = $myres->data->token;


// $result = file_get_contents($url);
// // Will dump a beauty json :3
// var_dump(json_decode($result, true));

$url1 = 'https://devapi.flexiroam.com/user/view/v1';
//var_dump(jwt_request($token, $url1));

//echo $token;

function jwt_request($token, $url , $post = '') {

   // header('Content-Type: application/json'); // Specify the type of data
    $ch = curl_init(); // Initialise cURL
    $post = json_encode($post); // Encode the data array into a JSON string
    

    $authorization = "Authorization: Bearer ".$token; // Prepare the authorisation token
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization )); // Inject the token into the header
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1); // Specify the request method as POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post); // Set the posted fields
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // This will follow any redirects
    $result = curl_exec($ch); // Execute the cURL statement
    curl_close($ch); // Close the cURL connection
    return json_decode($result); // Return the received data

}

function jwt_request2($token, $url , $post = '') {

   // header('Content-Type: application/json'); // Specify the type of data
    $ch = curl_init(); // Initialise cURL
    $post = json_encode($post); // Encode the data array into a JSON string
    
    $authorization = "Authorization: Bearer ".$token; // Prepare the authorisation token
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization )); // Inject the token into the header
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_MAXREDIRS, '');
    curl_setopt($ch, CURLOPT_TIMEOUT, '');
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);  
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); // Specify the request method as POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post); // Set the posted fields
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // This will follow any redirects
    $result = curl_exec($ch); // Execute the cURL statement
    curl_close($ch); // Close the cURL connection

    return json_decode($result); // Return the received data
}

/***************** create token **/

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://devapi.flexiroam.com/user/login/v1',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('email' => 'demoloadplan@flexiroam.com','password' => 'Demo!!!re!!1'),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

$token_reponse = json_decode($response);

/************ View Profile *****/

$curl = curl_init();
$token_con = 'token: ' .$token_reponse->data->token;
    //echo $token_con;
    curl_setopt_array($curl, 
        array(
            CURLOPT_URL => 'https://devapi.flexiroam.com/user/view/v1',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
            $token_con,
        ),
    ));
$response = curl_exec($curl);

curl_close($curl);
//echo $response;

/******* View Available SIM **/

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://devapi.flexiroam.com/product/inventory/available/v1',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('sku_type' => 'eSIM','availability' => '0'),
  CURLOPT_HTTPHEADER => array(
    $token_con
  ),
));


$response = curl_exec($curl);

curl_close($curl);
//echo $response;

/************* View Sim Inventory **********/

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://devapi.flexiroam.com/product/inventory/view/v1',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('availability' => '1'),
  CURLOPT_HTTPHEADER => array(
    $token_con
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
