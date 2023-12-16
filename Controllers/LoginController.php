<?php
    class LoginController {
        function route() {
            global $action;

            if($action == "login" || $action == "validation") {
                $this->render($action);
            }
            else {
                header("Location: /?controller=general&action=error");
            }
        }
        function render($action, $dataToSend = []) {
            if(!file_exists("Views/Login/$action.php")) {
                header("Location: /?controller=general&action=error");
            }
            else {
                extract($dataToSend);
                include_once "Views/Login/$action.php";
            }
        }
    }

?>