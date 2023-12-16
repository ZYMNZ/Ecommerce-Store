<?php
    include_once "Models/Review.php";
    class ReviewController {
        function route() {
            global $action;

            if($action == "postReview") {
                $this->render($action);
            }
            else {
                header("Location: /?controller=error&action=error");
            }
        }

        function render($action, $dataToSend = []) {

            if(!file_exists("Views/Review/$action.php")) {
                header("Location: /?controller=error&action=error");
            }
            else {
                extract($dataToSend);
                include_once "Views/Review/$action.php";
            }

        }
    }
?>