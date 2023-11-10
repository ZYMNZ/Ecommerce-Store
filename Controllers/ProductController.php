<?php
include_once 'Models/Category.php';
include_once 'Models/Product.php';
class ProductController {
    function route()
    {
        global $action;
        global $controllerPrefix;

        if ($action == "product") {
            $category = Category::getByCategoryName($_POST['category']);
            $products = Product::listProductsByCategory($category->getCategoryId());
            $this->render($action, $products);
        } else if ($action == "view") {
            $product = new Product($_GET['id']);
            $this->render($action, [$product]);
        } else if ($action == "create") {
            if (isset($_POST['submit'])) {
                session_start();
                Product::createProduct($_SESSION['user_id'], $_POST['title'], $_POST['description'], $_POST['price']);
            } else {
                $this->render($action, Category::listCategories());
            }
        } else if ($action == "update") {
            if (isset($_POST['submit'])) {
                Product::updateProduct($_SESSION['user_id'], $_POST['title'], $_POST['description'], $_POST['price'], $_GET['id']);
            } else {
                $this->render($action);
            }
        } else if ($action == "delete") {

        } else {
            $this->render($action);
        }

    }

    function render($action, $dataToSend = [])
    {
        extract($dataToSend);
        include_once "Views/Product/$action.php";
    }
}