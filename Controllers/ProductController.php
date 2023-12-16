<?php
include_once 'Models/Category.php';
include_once 'Models/Product.php';
include_once 'Views/General/session.php';
include_once 'Models/Review.php';

class ProductController {
    function route()
    {
        global $action;

        if(isset($_GET["id"]) && ($_GET["id"] < 0)) {
            // If the ID was set, but the ID is < 0, then go to the error page
            header("Location: /?controller=general&action=error");
        }
        // To list all the products
        if ($action == "product") {
//                $category = Category::getByCategoryName($_SESSION['category']);
//                if ($category == "None"){
//                    header("Location: /?controller=home&action=home");
//                }
            $categories = Category::listCategories();
            $category = Category::getByCategoryName($_SESSION['category']);

            if (isset($_SESSION['user_id'])) {
                $_SESSION['products'] = Product::getProductsByNotSpecificUserIdAndCategory($_SESSION['user_id'], $category->getCategoryId());
            } else {
                $_SESSION['products'] = Product::listProductsByCategory($category->getCategoryId());
            }
            $this->render($action, ['categories' => $categories, 'products' => $_SESSION['products']]);
        } else if ($action == "view" && isset($_GET["id"])) {
//            if(isset($_GET["id"]) && ($_GET["id"] < 0)) {
//                // If the ID was set, but the ID is < 0, then go to the error page
//                header("Location: /?controller=general&action=error");
//            }
            $product = new Product($_GET['id']);
            if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === $product->getUserId()) {
                header('Location: ?controller=product&action=product');
            }
            $categories = Category::listCategories();

            $reviewsAndUsers = Review::listReviewsAndUsersByProductId($product->getProductId());

            $dataToSend = [
                "product" => $product,
                "categories" => $categories,
                "reviewsAndUsers" => $reviewsAndUsers
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
            else {
                header("Location: /?controller=general&action=error");
            }
        }
        else if ($action == "updateSellerProduct") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'seller');
            // Get the current product and its category associated with it
            $product = new Product($_GET['id']);
            if($product->getUserId() != $_SESSION["user_id"]) {
                header("Location: /?controller=general&action=error");
            }
            $categories = Category::listCategories();
            $this->render($action, [$product, $categories]);
        }
        else if($action == "submitProductUpdate") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'seller');
            if(isset($_POST["submit"])) {
                $this->render($action);
            }
            else {
                header("Location: /?controller=general&action=error");
            }
        }
        else if ($action == "deleteSellerProduct") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'seller');
            $this->render($action);
         }
        else if ($action == "viewSellerProduct") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'seller');
            $product = new Product($_GET['id']);
            if($product->getUserId() != $_SESSION["user_id"]) {
                header("Location: /?controller=general&action=error");
            }
            $categories = Category::listCategories();
            $reviewsAndUsers = Review::listReviewsAndUsersByProductId($product->getProductId());

            $dataToSend = [
                "product" => $product,
                "categories" => $categories,
                "reviewsAndUsers" => $reviewsAndUsers
            ];
            $this->render($action, $dataToSend);
        }
        else {
            // If the action does not exist, go to the error page
            header("Location: /?controller=general&action=error");
        }
    }

    function render($action, $dataToSend = [])
    {
        if(!file_exists("Views/Product/$action.php")) {
            header("Location: /?controller=general&action=error");
        }
        else {
            extract($dataToSend);
            include_once "Views/Product/$action.php";
        }

    }
}