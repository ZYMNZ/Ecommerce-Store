<?php
include_once 'Models/Category.php';
//remove controller
class GeneralController {
    function route()
    {
        global $action;

        /*if ($action == "category") {
            $categories = Category::listCategories();
            $this->render($action, $categories);
        } else if ($action == "navbar") {
            $this->render($action);

        }*/

    }

    function render($action, $dataToSend = [])
    {
        extract($dataToSend);

        include_once "Views/General/$action.php";
    }
}