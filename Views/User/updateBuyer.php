<?php
$userInfo = new User($_GET['id']);
$isSuccessful = User::updatePersonalInfo(
    $_POST['firstName'],
    $_POST['lastName'],
    $_POST['email'],
    $userInfo->getPassword(),
    $userInfo->getDescription(),
    $userInfo->getPhoneNumber(),
    $_GET['id']
);
header('Location: /?controller=user&action=viewBuyers');
