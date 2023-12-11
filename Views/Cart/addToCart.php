<?php
//$product = new Product($_GET['id']);
$cart = Order::cartExists($_SESSION['user_id']);
//var_dump("beforeee");
//var_dump($cart);
if ($cart === null) {
    $cart = Order::createOrder($_SESSION['user_id']);
}
//var_dump("AFTERRR");
//var_dump($cart);
//var_dump("<br>");
//print_r($cart);
header('Location: ?controller=product&action=view&id='.$_GET['id']);
 var_dump($orderId = $cart->getOrderId());

$orderProduct = OrderProduct::createOrderProduct($cart->getOrderId(), $_GET['id']);
echo "<br>";
var_dump($orderProduct);
if ($orderProduct['isSuccessful'] === true) {
    header('Location: ?controller=product&action=view&id=' . $_GET['id']);
} else {
    header('Location: ?controller=cart&action=cart');
}