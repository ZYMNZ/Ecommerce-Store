<?php
    // Change the controller prefix to home once login view is done
    // Statements below get the controller GET parameter name from the URL
    // To decide which controller routes to the selected view
    $controllerPrefix = isset($_GET["controller"]) ? $_GET["controller"] : "login";
    $controllerName = ucfirst($controllerPrefix) . "Controller";

    include_once "Controllers/$controllerName.php";
    $controller = new $controllerName;
    $controller->route();
?>