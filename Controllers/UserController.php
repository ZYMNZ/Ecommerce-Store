<?php
include_once 'Models/User.php';
include_once 'Views/General/session.php';
class UserController
{

    function route(): void
    {
        global $action;
        if ($action == "personalDetails") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'buyer');
            $user = new User($_SESSION['user_id']);
            $this->render($action, ['user' => $user]);
        } else if ($action == "editPersonalDetails") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'buyer');
            $user = new User($_SESSION['user_id']);
            $this->render($action, ['user' => $user]);
        } else if ($action == "updatePersonalDetails") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'buyer');
            $this->render($action);
        } else if ($action == "changePassword") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'buyer');
            $this->render($action);
        } else if ($action == "updatePassword") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'buyer');
            $this->render($action);
        } else if ($action == "admin") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'admin');
            $this->render($action);
        } else if ($action == "viewBuyers") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'admin');
            $role = Role::getRoleByName('buyer');
            $userRoles = UserRole::getUserByRoleId($role->getRoleId());
            $users = [];
            foreach ($userRoles as $userRole) {
                $users[] = new User($userRole->getUserId());
            }
            $this->render($action, ['users' => $users]);
        } else if ($action == "viewSellers") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'admin');
            $role = Role::getRoleByName('seller');
            $userRoles = UserRole::getUserByRoleId($role->getRoleId());
            $users = [];
            foreach ($userRoles as $userRole) {
                $users[] = new User($userRole->getUserId());
            }
            $this->render($action, ['users' => $users]);
            $this->render($action);
        } else if ($action == "editBuyer") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'admin');
            $this->render($action, ['user' => new User($_GET['id'])]);
        } else if ($action == "deleteBuyer") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'admin');
            $this->render($action);
        } else if ($action == "updateBuyer") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'admin');
            $this->render($action);
        } else if($action == "editSeller") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'admin');
            $this->render($action, ['user' => new User($_GET['id'])]);
        } else if ($action == "deleteSeller") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'admin');
            $this->render($action);
        } else if ($action == "updateSeller") {
            noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'admin');
            $this->render($action);
        } else if ($action == "sellerRegister") {
            $this->render($action);
        } else if ($action == "validateSellerRegistration") {
            $this->render($action);
        }
    }

    function render($action, $data = []): void
    {
        extract($data);
        include_once "Views/User/$action.php";
    }
}