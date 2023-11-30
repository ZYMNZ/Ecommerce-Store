<?php
$product = new Product($_GET['id']);
$cart = Order::cartExists($_SESSION['user_id']);
var_dump($cart);
if ($cart === null) {
    $cart = Order::createOrder($_SESSION['user_id']);
}

$orderProduct = OrderProduct::createOrderProduct($cart->getOrderId(), $_GET['id']);
var_dump($orderProduct);
if ($orderProduct['isSuccessful'] === true) {
    header('Location: /?controller=product&action=view&id=' . $_GET['id']);
} else {
    header('Location: /?controller=cart&action=cart');
}