<?php
    class CartController {
        function route() {
            global $action;
            if($action == "cart") {
                $this->render($action);
            }
        }

        function render($action, $dataToSend = []) {
            extract($dataToSend);
            include_once "Views/Cart/$action.php";
        }
    }
?>