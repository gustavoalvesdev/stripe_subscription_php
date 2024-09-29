<?php
 // Include the Stripe PHP Library
 require_once('vendor/autoload.php');

 // Set your Stripe API secret key
 \Stripe\Stripe::setApiKey('private_key');

// Retrieve the Checkout Session ID from the URL parameter
$session_id = $_GET['session_id'];

try {
    // Retrieve the checkout session to check its status
    $session = \Stripe\Checkout\Session::retrieve($session_id);

    // The payment is not completed due to cancellation. Handle accordingly.
    echo "Payment canceled. You can try again later.";
} catch(\Stripe\Exception\ApiErrorException $e) {
    // An error occurred during retrieval. Handle the error here.
    echo "Error: " . $e->getMessage();
}