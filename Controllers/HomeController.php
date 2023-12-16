<?php
include_once 'Models/Category.php';
class HomeController{
    function route()
    {
        global $action;

        if ($action == "home"){
            $categories = Category::listCategories();
            $this->render($action, $categories);
        }
        else {
            header("Location: /?controller=general&action=error");
        }
    }
    function render($action,$dataToSend=[])
    {
        if(!file_exists("Views/Home/$action.php")) {
            header("Location: /?controller=general&action=error");
        }
        else {
            extract($dataToSend);
            include_once "Views/Home/$action.php";
        }

    }
}