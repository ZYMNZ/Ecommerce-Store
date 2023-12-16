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
        else {
            header("Location: /?controller=error&action=error");
        }
    }

    function render($action, $dataToSend = [])
    {
        if(!file_exists("Views/General/$action.php")) {
            header("Location: /?controller=error&action=error");
        }
        else {
            extract($dataToSend);
            include_once "Views/General/$action.php";
        }

    }
}