<?php
    class LoginController {
        function route() {
            $action = isset($_GET["action"]) ? $_GET["action"] : "login";

            if($action == "login") {
                $this->render($action);
            }
            else {

            }
        }
        function render($action, $dataToSend = []) {
            extract($dataToSend);

            include_once "Views/Login/$action.php";
        }
    }

?>