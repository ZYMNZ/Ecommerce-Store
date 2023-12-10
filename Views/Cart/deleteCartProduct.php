<?php
$deleteProduct = new OrderProduct();
$deleteProduct->deleteProductOrder($_GET['id']);
header("Location: ?controller=cart&action=cart");
//if ($success){
//    header("Location: ?controller=cart&action=cart");
//}
//else{
//
//    header("Location: ?controller=cart&action=cart");
//}