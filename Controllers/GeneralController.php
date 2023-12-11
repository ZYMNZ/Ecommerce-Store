<?php
include_once 'Models/Category.php';
include_once 'Models/Product.php';
include_once 'Views/General/session.php';
class GeneralController {
    function route()
    {
        global $action;
        if ($action == "handleCategoryForm") {
            $categories = Category::listCategories();
            $this->render($action, $categories);
        }
    }

    function render($action, $dataToSend = [])
    {
        extract($dataToSend);
        include_once "Views/General/$action.php";
    }
}