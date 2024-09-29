<?php 
// Include the Stripe PHP library
require_once('vendor/autoload.php');

// Set your Stripe API secret key
\Stripe\Stripe::setApiKey('private_key');

// Replace with your Price ID
$priceID = 'price_id';

// Create a checkout session
$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [
        [
            'price' => $priceID,
            'quantity' => 1,
        ]
    ],
    'mode' => 'subscription',
    'success_url' => 'http://localhost/stripe-subscription/success.php?session_id={CHECKOUT_SESSION_ID}',
    'cancel_url' => 'http://localhost/stripe-subscription/cancel.php?session_id={CHECKOUT_SESSION_ID}'
]);

// Redirect your customer to the checkout page
header("Location: " . $session->url);
exit();
