<?php
    class RegistrationController {
        function route() {
            $action = isset($_GET["action"]) ? $_GET["action"] : "registration";

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