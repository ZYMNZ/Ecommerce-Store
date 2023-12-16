<?php
include_once "Views/General/session.php";
include_once 'Models/Product.php';
include_once 'Models/Order.php';
include_once 'Models/OrderProduct.php';
    class CartController
    {
        function route(): void
        {
            global $action;
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'buyer');
            if ($action == "cart") {
                $display = Order::displayCart($_SESSION['user_id']);
                $categories = Category::listCategories();
//                var_dump($display);
                if ($display != null) {
                    $this->render($action, ['display' => $display, 'categories' => $categories]);
                }
                else{
                $this->render($action, $categories);
                }
            } else if ($action == "addToCart") {
                $this->render($action);
            } else if ($action == "deleteCartProduct") {
                $this->render($action);
            }
            else {
                throw new ErrorException();
            }
        }

        function render($action, $dataToSend = []): void
        {
            extract($dataToSend);
            include_once "Views/Cart/$action.php";
        }
    }
