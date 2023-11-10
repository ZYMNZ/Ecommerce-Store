<?php
var_dump($_POST);
session_start();
include_once 'Models/User.php';
include_once 'Models/UserUserGroup.php';
$user = new User($_SESSION['user_id']);
echo (md5($user->getPassword()) === $_POST['password']);
if (md5($user->getPassword()) === $_POST['password']) {
    UserUserGroup::createUserUserGroup($user->getUserId(), 1);
    header("Location: /?controller=seller&action=products");
} else {
    header("Location: /?controller=seller&action=register");
}