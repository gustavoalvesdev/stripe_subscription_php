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

    if ($session->payment_status === 'paid') {
        // The payment is successful. You can handle any additional actions here
        echo "Thank you for your purchase!";
    } else {
        // The payment is not yet completed or failed. Handle accordingly
        echo "Payment not completed. Please contact support.";
    }
} catch(\Stripe\Exception\ApiErrorException $e) {
    // An error occured during retrieval. Handle the error here.
    echo "Error: " . $e->getMessage();
}