<?php

require_once '../vendor/autoload.php';
require_once '../secrets.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);
header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/organicshop/pages';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [
    array('price' => 'price_1OkhSLHozY605ZZpAn4u8ucI',
    'quantity' => 1),
    array('price' => 'price_1OkhB0HozY605ZZpJtBb4ENW',
    'quantity' => 3),
    array('price' => 'price_1OkhSLHozY605ZZpAn4u8ucI',
    'quantity' => 1),
    array('price' => 'price_1OkhB0HozY605ZZpJtBb4ENW',
    'quantity' => 3),
    array('price' => 'price_1OkhSLHozY605ZZpAn4u8ucI',
    'quantity' => 1),
    array('price' => 'price_1OkhB0HozY605ZZpJtBb4ENW',
    'quantity' => 3)
  ],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/catalogue.html',
  'cancel_url' => $YOUR_DOMAIN . '/cart.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);