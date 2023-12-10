<?php
// Add a product row to the product table
// And add a row to the relationship table product_category to give a category associated
// To that product
var_dump($_FILES["productImage"]["name"]);
$imageToBeUploaded = isset($_FILES["productImage"]["name"])? Product::PRODUCT_IMAGE_UPLOAD_PATH . $_FILES["productImage"]["name"] : "";
Product::updateProduct($_SESSION['user_id'], $_POST['title'], $_POST['description'], $_POST['price'], $_GET['id'], $_POST["category"], $imageToBeUploaded);
header("Location: /?controller=product&action=sellerProduct");
?>