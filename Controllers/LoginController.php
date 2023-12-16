<?php
    class LoginController {
        function route() {
            global $action;

            if($action == "login" || $action == "validation") {
                $this->render($action);
            }
            else {
                throw new ErrorException();
            }
        }
        function render($action, $dataToSend = []) {
            extract($dataToSend);

            include_once "Views/Login/$action.php";
        }
    }

?>