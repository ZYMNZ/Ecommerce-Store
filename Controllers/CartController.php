<?php
include_once "Views/General/session.php";
include_once 'Models/Product.php';
include_once 'Models/Order.php';
include_once 'Models/OrderProduct.php';
    class CartController {
        function route(): void
        {
            global $action;
            if($action == "cart") {
                $displayCart = new Order();
                $display = $displayCart->displayCart($_SESSION['user_id']);
//                var_dump($display);
                if ($display != null) {
                    $this->render($action, $display);
                }
                else{
                    $this->render($action);
                }
            } else if ($action == "addToCart") {
                $this->render($action);
            }
            else if ($action == "deleteCartProduct"){
                $this->render($action);
            }
        }

        function render($action, $dataToSend = []): void
        {
            extract($dataToSend);
            include_once "Views/Cart/$action.php";
        }
    }
