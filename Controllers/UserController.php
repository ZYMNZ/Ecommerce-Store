<?php
include_once 'Models/User.php';
class UserController
{

    function route(): void
    {
        global $action;
        if ($action == "personalDetails") {
            session_start();
            $user = new User($_SESSION['user_id']);
//            var_dump($user);
            $this->render($action, ['user' => $user]);
        } else if ($action == "editPersonalDetails") {
            session_start();
            $user = new User($_SESSION['user_id']);
            $this->render($action, ['user' => $user]);
        } else if ($action == "updatePersonalDetails") {
            $this->render($action);
        } else if ($action == "changePassword") {
            $this->render($action);
        } else if ($action == "updatePassword") {
            $this->render($action);
        }
    }

    function render($action, $data = []): void
    {
        extract($data);
        include_once "Views/User/$action.php";
    }
}