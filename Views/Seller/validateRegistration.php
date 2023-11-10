<?php
//session_start();
include_once 'Models/User.php';
include_once 'Models/UserUserGroup.php';

if (isset($_POST['submit'])) {
    $user = new User($_SESSION['user_id']);
    if ($user->getPassword() === md5($_POST['password'])) {
        UserUserGroup::createUserUserGroup($user->getUserId(), 2);
        $_SESSION['group_id'][1] = 1;
        header("Location: /?controller=seller&action=products");
    } else {
        header("Location: /?controller=seller&action=register");
    }
}
