<?php
include_once 'Models/Product.php';
include_once 'Models/ProductCategory.php';
include_once 'Models/Category.php';
include_once 'Views/General/session.php';
notLoggedIn();

class SellerController {
    function route()
    {
        global $action;
        global $controllerPrefix;
        if ($action == "register" || $action == "validateRegistration"){
            $this->render($action);
        }
    }
    function render($action,$dataToSend=[])
    {
        extract($dataToSend);
        include_once "Views/Seller/$action.php";
    }
}