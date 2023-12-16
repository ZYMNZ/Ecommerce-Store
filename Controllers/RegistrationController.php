<?php
include_once 'Views/General/session.php';
    include_once "Models/User.php";
    class RegistrationController {
        function route() {
            global $action;
            if(!isset($_SESSION['user_id'])) {
                if ($action == "registration" || $action == "register") {
                    $this->render($action);
                } else {
                    header("Location: /?controller=general&action=error");
                }
            }else{
                header("Location: ?controller=home&action=home");
            }

        }

        function render($action, $dataToSend = []) {

            if(!file_exists("Views/Registration/$action.php")) {
                header("Location: /?controller=general&action=error");
            }
            else {
                extract($dataToSend);
                include_once "Views/Registration/$action.php";
            }
        }
    }

?>