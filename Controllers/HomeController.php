<?php
class HomeController{
    function route()
    {
        global $action;
        global $controllerPrefix;
        if ($action == "home"){
            $this->render($action);
        }
        else{

        }
    }
    function render($action,$dataToSend=[])
    {
        extract($dataToSend);
        include_once "Views/Home/$action.php";
    }
}