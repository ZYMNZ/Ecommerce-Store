<?php
var_dump("hellooo");
Product::createProduct($_SESSION['user_id'], $_POST['title'], $_POST['description'], $_POST['price']);
$product = Product::getLastProductCreatedByUser($_SESSION['user_id']);
$category = Category::getByCategoryName($_POST['category']);
ProductCategory::createProductCategory($product->getProductId(), $category->getCategoryId());
header("Location: /?controller=product&action=sellerProduct");



