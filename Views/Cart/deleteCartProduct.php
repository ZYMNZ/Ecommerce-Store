<?php
$deleteProduct = new OrderProduct();
$success = $deleteProduct->deleteProductOrder($_GET['id']);

var_dump($success); // this returns true
if ($success){
    header("Location: ?controller=cart&action=cart");
}
else{
    header("Location: ?controller=cart&action=cart");
}