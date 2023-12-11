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
    }

    function render($action, $dataToSend = []): void
    {
        extract($dataToSend);
        include_once "Views/Order/$action.php";
    }
}