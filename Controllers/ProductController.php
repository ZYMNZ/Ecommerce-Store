<?php
include_once 'Models/Category.php';
include_once 'Models/Product.php';
include_once 'Views/General/session.php';
notLoggedIn();
notUser();
class ProductController {
    function route()
    {
        global $action;
        global $controllerPrefix;

        if ($action == "product") {
//            var_dump($_POST['category']);
            if ($_POST['category'] != "None") {
//                var_dump("inside");
                $category = Category::getByCategoryName($_POST['category']);
                if ($category == "None"){
                    header();
                }
                $products = Product::listProductsByCategory($category->getCategoryId());
                $this->render($action, $products);
            }

        } else if ($action == "view") {
            $product = new Product($_GET['id']);
            $this->render($action, [$product]);
        } else {

        }

    }

    function render($action, $dataToSend = [])
    {
        extract($dataToSend);
        include_once "Views/Product/$action.php";
    }
}