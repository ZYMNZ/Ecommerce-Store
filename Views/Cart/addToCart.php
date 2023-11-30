<?php
$product = new Product($_GET['id']);
$cart = Order::cartExists($_SESSION['user_id']);
if ($cart->getOrderId() === null) {
    $cart = Order::createOrder($_SESSION['user_id']);
}
OrderProduct::createOrderProduct($cart->getOrderId(), $_GET['id']);
header('Location: /?controller=product&action=view&id=' . $_GET['id']);

