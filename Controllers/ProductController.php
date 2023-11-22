<?php
include_once 'Models/Category.php';
include_once 'Models/Product.php';
include_once "Models/ProductCategory.php";
include_once 'Views/General/session.php';

notLoggedIn();
notUser();
class ProductController {
    function route()
    {
        global $action;
        global $controllerPrefix;

        // To list all theproducts
        if ($action == "product") {
//            var_dump($_POST['category']);
            if ($_POST['category'] != "None") {
//                var_dump("inside");
                $category = Category::getByCategoryName($_POST['category']);
                if ($category == "None"){
                    header("/?controller=home&action=home");
                }
                $products = Product::listProductsByCategory($category->getCategoryId());
                $this->render($action, $products);
            }

        } else if ($action == "view") {
            $product = new Product($_GET['id']);
            $this->render($action, [$product]);
        }

        //SELLER PRODUCTS
        else if ($action == "sellerProduct") {
            $products = Product::getProductsByUserId($_SESSION['user_id']);
            $this->render($action, [$products]);
        }
        else if ($action == "createSellerProduct") {
            $categories = Category::listCategories();
            $this->render($action, $categories);
        }
        else if($action == "submitProductCreation") {
            if(isset($_POST["submit"])) {
                $this->render($action);
            }
        }
        else if ($action == "updateSellerProduct") {
            // Get the current product and its category associated with it
            $product = new Product($_GET['id']);
            $productCategory = new ProductCategory($_GET['id']);
            $categories = Category::listCategories();
            $this->render($action, [$product, $productCategory, $categories]);
        }
        else if($action == "submitProductUpdate") {
            if(isset($_POST["submit"])) {
                $this->render($action);
            }
        }
        else if ($action == "deleteSellerProduct") {
            $this->render($action);
         }
    }

    function render($action, $dataToSend = [])
    {
        extract($dataToSend);
        include_once "Views/Product/$action.php";
    }
}