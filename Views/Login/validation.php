<?php
include_once 'Models/User.php';
include_once 'Models/Category.php';
$user = User::getUserByEmailAndPassword($_POST['email'], md5($_POST['password']));
if ($user) {
    session_start();
    $_SESSION["user_id"] = $user["user_id"];
    $_SESSION["group_id"] = $user["group_id"];
    header("Location: /?controller=home&action=home");
} else {
    header("Location: /?controller=login&action=login");
}
