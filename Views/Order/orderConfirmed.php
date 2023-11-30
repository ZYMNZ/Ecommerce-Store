<?php
$cart = Order::cartExists($_SESSION['user_id']);
Order::orderConfirm($cart->getOrderId());
header('Location: /?controller=home&action=home');
