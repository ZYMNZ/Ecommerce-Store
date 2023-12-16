<?php
include_once 'Views/General/session.php';
include_once 'Models/Order.php';
class OrderController{
    function route(): void
    {
        global $action;
        if ($action == "orderConfirmed" || $action == "greeting") {
            $this->render($action);
        }
        else {
            header("Location: /?controller=general&action=error");
        }
    }

    function render($action, $dataToSend = []): void
    {
        if(!file_exists("Views/Order/$action.php")) {
            header("Location: /?controller=general&action=error");
        }
        else {
            extract($dataToSend);
            include_once "Views/Order/$action.php";
        }

    }
}