<?php
include_once 'Views/General/session.php';
    include_once "Models/Review.php";
    class ReviewController {
        function route() {
            global $action;

            noAccess($_SESSION["user_id"], $_SESSION["userRoles"], "buyer");
            if($action == "postReview") {
                $this->render($action);
            }
            else {
                header("Location: /?controller=general&action=error");
            }
        }

        function render($action, $dataToSend = []) {

            if(!file_exists("Views/Review/$action.php")) {
                header("Location: /?controller=general&action=error");
            }
            else {
                extract($dataToSend);
                include_once "Views/Review/$action.php";
            }

        }
    }
?>