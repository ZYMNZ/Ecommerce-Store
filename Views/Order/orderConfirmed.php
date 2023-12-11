<?php
$cart = Order::cartExists($_SESSION['user_id']);
if ($cart === null) {
    header('Location: ?controller=cart&action=cart');
}
Order::orderConfirm($cart->getOrderId());
header('Location: ?controller=order&action=greeting');
