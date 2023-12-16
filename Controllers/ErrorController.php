<?php
    class ErrorController {
        function route() {
            global $action;
            if($action == "error") {
                $this->render($action);
            }
            else {
                header("Location: /?controller=error&action=error");
            }
        }

        function render($action, $dataToSend = []) {
            if(!file_exists("Views/General/$action.php")) {
                header("Location: /?controller=error&action=error");
            }
            else {
                extract($dataToSend);
                include_once "Views/General/$action.php";
            }

        }
    }
?>