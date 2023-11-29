<?php
include_once 'Models/Category.php';
include_once 'Models/Product.php';
include_once "Models/ProductCategory.php";
include_once 'Views/General/session.php';

class ProductController {
    function route()
    {
        global $action;

        // To list all the products
        if ($action == "product") {
//            var_dump($_POST['category']);
            if ($_POST['category'] != "None") {
//                var_dump("inside");
                $category = Category::getByCategoryName($_POST['category']);
                if ($category == "None"){
                    header("/?controller=home&action=home");
                }
                $products = Product::listProductsByCategory($category->getCategoryId());

                $categories = Category::listCategories();

                $dataToSend = [
                    "products" => $products,
                    "categories" => $categories
                ];
                $this->render($action, $dataToSend);
            }

        } else if ($action == "view") {
            $product = new Product($_GET['id']);
            $categories = Category::listCategories();
            $dataToSend = [
                "product" => $product,
                "categories" => $categories
            ];
            $this->render($action, $dataToSend);
        }
        //SELLER PRODUCTS
        else if ($action == "sellerProduct") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'seller');
            $products = Product::getProductsByUserId($_SESSION['user_id']);
            $this->render($action, $products);
        }
        else if ($action == "createSellerProduct") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'seller');
            $categories = Category::listCategories();
            $this->render($action, $categories);
        }
        else if($action == "submitProductCreation") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'seller');
            if(isset($_POST["submit"])) {
                $this->render($action);
            }
        }
        else if ($action == "updateSellerProduct") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'seller');
            // Get the current product and its category associated with it
            $product = new Product($_GET['id']);
            $productCategory = new ProductCategory($_GET['id']);
            $categories = Category::listCategories();
            $this->render($action, [$product, $productCategory, $categories]);
        }
        else if($action == "submitProductUpdate") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'seller');
            if(isset($_POST["submit"])) {
                $this->render($action);
            }
        }
        else if ($action == "deleteSellerProduct") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'seller');
            $this->render($action);
         }
    }

    function render($action, $dataToSend = [])
    {
        extract($dataToSend);
        include_once "Views/Product/$action.php";
    }
}