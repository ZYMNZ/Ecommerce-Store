<?php
    class RegistrationController {
        function route() {
            global $action;

            if($action == "registration") {
                $this->render($action);
            }
            else {

            }
        }

        function render($action, $dataToSend = []) {
            extract($dataToSend);

            include_once "Views/Registration/$action.php";
        }
    }

?>