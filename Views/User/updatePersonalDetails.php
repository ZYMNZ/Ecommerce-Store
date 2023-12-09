<?php
session_start();
$currentInfo = new User($_SESSION['user_id']);
$description = null;
$phoneNumber = null;
if (!isset($_POST['description'])) {
    $description = $currentInfo->getDescription();
} else {
    $description = $_POST['description'];
}
if (!isset($_POST['phoneNumber'])) {
    $phoneNumber = $currentInfo->getPhoneNumber();
} else {
    $phoneNumber = $_POST['phoneNumber'];
}
$isSuccessful = User::updatePersonalInfo($_POST['firstName'], $_POST['lastName'], $currentInfo->getEmail(), $currentInfo->getPassword(), $description, $phoneNumber, $_SESSION['user_id']);
header('Location: /?controller=user&action=personalDetails');


