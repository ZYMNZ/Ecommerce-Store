<?php
include_once 'Models/User.php';
include_once 'Models/UserUserGroup.php';
$user = User::getUserByEmailAndPassword($_POST['email'], md5($_POST['password']));
$permissions = UserUserGroup::permissions($user->getUserId());
$roles = [0, 0, 0];
foreach ($permissions as $permission) {
    if ($permission->getUserGroupId() === 1) { //admin
        $roles[0] = 1;
    } else if ($permission->getUserGroupId() === 2) { //seller
        $roles[1] = 1;
    } else { //user
        $roles[2] = 1;
    }
}
//var_dump($roles);
session_start();
$_SESSION["user_id"] = $user->getUserId();
$_SESSION["group_id"] = $roles;
if ($_SESSION["group_id"][2] === 1) {
    header("Location: /?controller=home&action=home");
} else {
    session_unset();
    session_destroy();
    header("Location: /?controller=login&action=login");
}
