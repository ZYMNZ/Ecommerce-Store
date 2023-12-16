<?php
$emailExistence = User::checkForExistingEmail($_POST['email']);
if ($emailExistence) {
    $_SESSION['error'] = 'email already exists';
    header("Location: ?controller=registration&action=registration");
} else {
    User::registerUser($_POST);
    header("Location: ?controller=login&action=login");
}
