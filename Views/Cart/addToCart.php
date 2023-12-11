<?php
$cart = Order::cartExists($_SESSION['user_id']);
if ($cart === null) {
    $cart = Order::createOrder($_SESSION['user_id']);
}
$orderProduct = OrderProduct::createOrderProduct($cart->getOrderId(), $_GET['id']);
if ($orderProduct['isSuccessful'] === false) {
    $_SESSION['error'] = 'cannot add the same product';
}
header('Location: ?controller=cart&action=cart');