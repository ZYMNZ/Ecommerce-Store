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
        } else if ($action == "admin") {
            $this->render($action);
        } else if ($action == "viewBuyers") {
            $role = Role::getRoleByName('buyer');
            $userRoles = UserRole::getUserByRoleId($role->getRoleId());
            $users = [];
            foreach ($userRoles as $userRole) {
                $users[] = new User($userRole->getUserId());
            }
            $this->render($action, ['users' => $users]);
        } else if ($action == "viewSellers") {
            $this->render($action);
        } else if ($action == "editBuyer") {
            $this->render($action, ['user' => new User($_GET['id'])]);
        } else if ($action == "deleteBuyer") {
            $this->render($action);
        } else if ($action == "updateBuyer") {
            $this->render($action);
        }
    }

    function render($action, $data = []): void
    {
        extract($data);
        include_once "Views/User/$action.php";
    }
}