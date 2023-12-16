<?php
    // Change the controller prefix to home once login view is done
    // Statements below get the controller GET parameter name from the URL
    // To decide which controller routes to the selected view
    $controllerPrefix = isset($_GET["controller"]) ? $_GET["controller"] : "home";
    $controllerName = ucfirst($controllerPrefix) . "Controller";

    $action = isset($_GET["action"]) ? $_GET["action"] : "home";


    // Set a new error handler for when an error is thrown
    // Once an E_WARNING or an ErrorException is thrown, this is where the error will be handled
    set_error_handler(/**
     * @throws ErrorException
     */ function($errno, $errstr, $errfile, $errline) {
        if(error_reporting() === 0)  {
            // If we come here, this means that there was no error
            return false;
        }
        // If we come here, this means that there is an error and we must catch it
        // because the number error_reporting reported was other than 0
        // The error is turned into an exception
        throw new ErrorException();
    });

    try {
        include_once "Controllers/$controllerName.php";
        $controller = new $controllerName;
        $controller->route();
        // The document parses after the try-catch block (?), and the errors that are produced by those pages will not be caught here
    }
    catch (ErrorException $e) {
        header("Location: /?controller=error&action=error");
    }
    // Restore the error handler to the built-in one
    restore_error_handler();

