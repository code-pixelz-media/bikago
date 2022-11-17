<?php
include($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
/**
 * 
 * 
 * 
 * fname: raka
lname: daka
address: 6850 Guion Rd, , IN 46268
ime_nos: 123123123123123
passport: 
bsm-plan: sim-plan-2
bsm-price: 200
*/

require_once(__DIR__.'/stripe-php/init.php');

$key = get_option( 'stripe_secret');

// This is your test secret API key.
\Stripe\Stripe::setApiKey( $key );

function calculateOrderAmount(array $items): int {
    // Replace this constant with a calculation of the order's amount
    // Calculate the order total on the server to prevent
    // people from directly manipulating the amount on the client
//var_dump(items);
    if( !empty( $items[0]->price ) ){
        $price = (float)$items[0]->price * 100;
    }else{
        $price = 0;
    }

    return $price;
}

header('Content-Type: application/json');

try {
    // retrieve JSON from POST body
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);

    // Create a PaymentIntent with amount and currency
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => calculateOrderAmount($jsonObj->items),
        'currency' => 'usd',
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
    ]);

    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}