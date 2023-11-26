<?php
session_start();
$currentInfo = new User($_SESSION['user_id']);
$isSuccessful = User::updatePersonalInfo([$_POST['firstName'], $_POST['lastName'], $currentInfo->getEmail(), $currentInfo->getPassword(), $_POST['description'], $_POST['phoneNumber'], $_SESSION['user_id']]);
header('Location: /?controller=user&action=personalDetails');


