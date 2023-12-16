<?php
    class ErrorController {
        function route() {
            global $action;
            if($action == "error") {
                $this->render($action);
            }
            else {
                throw new ErrorException();
            }
        }

        function render($action, $dataToSend = []) {
            extract($dataToSend);
            include_once "Views/General/$action.php";
        }
    }
?>