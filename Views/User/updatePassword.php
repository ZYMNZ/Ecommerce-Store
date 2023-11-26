<?php
session_start();
$user = new User($_SESSION['user_id']);
if (isset($_POST['currentPassword']) && md5($_POST['currentPassword']) === $user->getPassword())
{
    if (isset($_POST['newPassword'])
        && isset($_POST['confirmPassword'])
        && strlen($_POST['newPassword']) > 0
        && strlen($_POST['confirmPassword']) > 0)
    {
        if ($_POST['newPassword'] === $_POST['confirmPassword'])
        {
            User::updatePersonalInfo([
                $user->getFirstName(),
                $user->getLastName(),
                $user->getEmail(),
                $_POST['newPassword'],
                $user->getDescription(),
                $user->getPhoneNumber(),
                $user->getUserId()
            ]);
            header('Location: /?controller=user&action=personalDetails');
        } else {
            header('Location: /?controller=user&action=changePassword&status=passwordMismatch');
        }
    } else
    {
        header('Location: /?controller=user&action=changePassword&status=enterNewPassword');
    }
} else
{
    header('Location: /?controller=user&action=changePassword&status=wrongPassword');
}
