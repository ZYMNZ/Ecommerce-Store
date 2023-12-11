<?php
$orderId = null;
$cart = Order::cartExists($_SESSION['user_id']);

if ($cart === null) {
    $cart = Order::createOrder($_SESSION['user_id']);
    $orderId = $cart['orderId'];
} else {
    $orderId = $cart->getOrderId();
}
$orderProduct = OrderProduct::createOrderProduct($orderId, $_GET['id']);
if ($orderProduct['isSuccessful'] === false) {
    $_SESSION['error'] = 'cannot add the same product';
}
header('Location: ?controller=cart&action=cart');