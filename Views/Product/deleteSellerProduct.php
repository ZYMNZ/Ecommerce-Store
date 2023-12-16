<?php
$product = new Product($_GET["id"]);
if($product->getUserId() != $_SESSION["user_id"]) {
    header("Location: /?controller=general&action=error");
}
else {
    Product::deleteProduct($_GET['id']);
    header("Location: ?controller=product&action=sellerProduct");
}

