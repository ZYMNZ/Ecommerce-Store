<?php
var_dump($_POST);
// Add a product row to the product table
// And add a row to the relationship table product_category to give a category associated
// To that product
Product::updateProduct($_SESSION['user_id'], $_POST['title'], $_POST['description'], $_POST['price'], $_GET['id']);
ProductCategory::updateProductCategory($_GET['id'], intval($_POST['category_id']));
header("Location: /?controller=product&action=sellerProduct");
?>