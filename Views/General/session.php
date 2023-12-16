<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();

}
function noAccess($userId, $userRoles, $permission): void
{
    if ((!isset($userRoles) || $userRoles === "")
        || (!isset($userId) || $userId === -1)
        || !in_array($permission, $userRoles)) {
        header("Location: /?controller=home&action=home");
    }
}