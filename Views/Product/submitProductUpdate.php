<?php
// Add a product row to the product table
// And add a row to the relationship table product_category to give a category associated
// To that product
$imageToBeUploaded = strlen($_FILES["productImage"]["name"]) > 0? Product::PRODUCT_IMAGE_UPLOAD_PATH . $_FILES["productImage"]["name"] : "";
var_dump($imageToBeUploaded);
$uploadStatus = Product::updateProduct($_SESSION['user_id'], $_POST['title'], $_POST['description'], $_POST['price'], $_GET['id'], $_POST["category"], $imageToBeUploaded);
/*
 * If the image that was uploaded was the same or the upload of the image was successful, you don't need to redirect the user to an error page
*/
if(strlen($imageToBeUploaded) == 0 || $uploadStatus["imageIsSame"] || $uploadStatus["shouldUploadImage"])
{
    header("Location: /?controller=product&action=sellerProduct");
}
else {
    header("Location: /?controller=product&action=updateSellerProduct&id=" . $_GET["id"]);
}
?>