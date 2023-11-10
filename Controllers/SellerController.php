<?php
include_once 'Models/Product.php';
include_once 'Models/ProductCategory.php';
include_once 'Models/Category.php';
include_once 'Views/General/session.php';
notLoggedIn();
notSeller();
class SellerController {
    function route()
    {
        global $action;
        global $controllerPrefix;
        if ($action == "register" || $action == "validateRegistration"){
            $this->render($action);
        } else if ($action == "products") {
            $products = Product::getProductsByUserId($_SESSION['user_id']);
            $this->render($action, $products);
        } else if ($action == "create") {
            if (isset($_POST['submit'])) {
                Product::createProduct($_SESSION['user_id'], $_POST['title'], $_POST['description'], $_POST['price']);
                $product = Product::getLastProductCreatedByUser($_SESSION['user_id']);
                $category = Category::getByCategoryName($_POST['category']);
                ProductCategory::createProductCategory($product->getProductId(), $category->getCategoryId());
                header("Location: /?controller=seller&action=products");
            } else {
                $categories = Category::listCategories();
                $this->render($action, $categories);
            }
        } else if ($action == "update") {
            if (isset($_POST['submit'])) {
                Product::updateProduct($_SESSION['user_id'], $_POST['title'], $_POST['description'], $_POST['price'], $_GET['id']);
                ProductCategory::updateProductCategory($_GET['id'], $_POST['category']);
                header("Location: /?controller=seller&action=products");
            } else {
                $product = new Product($_GET['id']);
                $productCategory = new ProductCategory($_GET['id']);
                $categories = Category::listCategories();
                $this->render($action, [$product, $productCategory, $categories]);
            }
        } else if ($action == "delete") {
            Product::deleteProduct($_GET['id']);
            $this->render($action = 'products');

        }
        else {

        }
    }
    function render($action,$dataToSend=[])
    {
        extract($dataToSend);
        include_once "Views/Seller/$action.php";
    }
}