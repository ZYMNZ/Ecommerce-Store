<?php
include_once 'Models/User.php';
include_once 'Models/UserRole.php';
include_once 'Models/Role.php';
$user = User::getUserByEmailAndPassword($_POST['email'], md5($_POST['password']));
if (!$user) header("Location: /?controller=login&action=login");
$permissions = UserRole::getUserRoles($user->getUserId());
if (!$permissions) header("Location: /?controller=login&action=login");
session_start();
$_SESSION["userRoles"] = Role::convertRoleIdsToRoleNames($permissions);
$_SESSION["user_id"] = $user->getUserId();
if (in_array('buyer', $_SESSION["userRoles"], true)) {
    header("Location: /?controller=home&action=home");
} else {
    header("Location: /?controller=login&action=login");
}