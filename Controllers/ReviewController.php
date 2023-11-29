<?php
    include_once "Models/Review.php";
    class ReviewController {
        function route() {
            global $action;

            if($action == "postReview") {
                $this->render($action);
            }

        }

        function render($action, $dataToSend = []) {
            extract($dataToSend);

            include_once "Views/Review/$action.php";
        }
    }
?>