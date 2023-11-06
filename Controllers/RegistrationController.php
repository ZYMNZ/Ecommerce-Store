<?php
    include_once "Models/User.php";
    class RegistrationController {
        function route() {
            global $action;

            if($action == "registration" || $action == "register") {
                $this->render($action);
            }

        }

        function render($action, $dataToSend = []) {
            extract($dataToSend);

            include_once "Views/Registration/$action.php";
        }
    }

?>