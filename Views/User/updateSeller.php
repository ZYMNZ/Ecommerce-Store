<?php
$userInfo = new User($_GET['id']);
$isSuccessful = User::updatePersonalInfo(
    $_POST['firstName'],
    $_POST['lastName'],
    $_POST['email'],
    $userInfo->getPassword(),
    $_POST['description'],
    $_POST['phoneNumber'],
    $_GET['id']
);
header('Location: /?controller=user&action=viewSellers');
