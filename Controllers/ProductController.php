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
        } else if ($action == "create" & isset($_POST['ac'])) {
            var_dump($_POST);
            $category = Product::createProduct();
            $this->render($action, [$product]);
        } else if ($action == "create") {
            $this->render($action);
        }

    }

    function render($action, $dataToSend = [])
    {
        extract($dataToSend);
        include_once "Views/Product/$action.php";
    }
}