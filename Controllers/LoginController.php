<?php
    class LoginController {
        function route() {
            global $action;
            global $controllerPrefix;
            if($action == "login" || $action == "validation") {
                $this->render($action);
            }

        }
        function render($action, $dataToSend = []) {
            extract($dataToSend);

            include_once "Views/Login/$action.php";
        }
    }

?>