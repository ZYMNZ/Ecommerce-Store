<?php
include_once 'Models/Category.php';
class GeneralController {
    function route()
    {
        global $action;
        global $controllerPrefix;

        if ($action == "category") {
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