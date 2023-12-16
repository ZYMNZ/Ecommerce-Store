<?php
    // Change the controller prefix to home once login view is done
    // Statements below get the controller GET parameter name from the URL
    // To decide which controller routes to the selected view
    $controllerPrefix = isset($_GET["controller"]) ? $_GET["controller"] : "home";
    $controllerName = ucfirst($controllerPrefix) . "Controller";

    $action = isset($_GET["action"]) ? $_GET["action"] : "home";


    if(!file_exists("Controllers/$controllerName.php")) {
        header("Location: /?controller=general&action=error");
    }
    else {
        include_once "Controllers/$controllerName.php";
        $controller = new $controllerName;
        $controller->route();
    }



