<?php
include_once "Views/General/session.php";
$imageToBeUploaded = strlen($_FILES["productImage"]["name"] > 0)? Product::PRODUCT_IMAGE_UPLOAD_PATH . $_FILES["productImage"]["name"] : "";
$uploadStatus = Product::createProduct($_SESSION['user_id'], $_POST['title'], $_POST['description'], $_POST['price'], $_POST["category"], $imageToBeUploaded);
$product = Product::getLastProductCreatedByUser($_SESSION['user_id']);

if($uploadStatus["imageIsSame"] || $uploadStatus["shouldUploadImage"] || strlen($imageToBeUploaded) == 0)
{
    header("Location: /?controller=product&action=sellerProduct");
}
else {
    header("Location: /?controller=product&action=createSellerProduct");
}




