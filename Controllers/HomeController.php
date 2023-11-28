<?php
include_once 'Models/Category.php';
include_once 'Views/General/session.php';
notLoggedIn();
notUser();
class HomeController{
    function route()
    {
        global $action;

        if ($action == "home"){
            $categories = Category::listCategories();
            $this->render($action, $categories);
        }
//        else {
//
//        }
    }
    function render($action,$dataToSend=[])
    {
        extract($dataToSend);
        include_once "Views/Home/$action.php";
    }
}