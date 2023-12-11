<?php
$deleteProduct = new OrderProduct();
$success = $deleteProduct->deleteProductOrder($_GET['id']);

if ($success){
    header("Location: ?controller=cart&action=cart");
}
else{

    header("Location: ?controller=cart&action=cart");
}