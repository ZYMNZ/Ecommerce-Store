<?php
var_dump($_POST["category"]);
Product::createProduct($_SESSION['user_id'], $_POST['title'], $_POST['description'], $_POST['price'], $_POST["category"]);
$product = Product::getLastProductCreatedByUser($_SESSION['user_id']);
header("Location: /?controller=product&action=sellerProduct");



