<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function notLoggedIn(): void
{
    if (!isset($_SESSION['user_id'])) {
        header("Location: /?controller=home&action=home");
    }
}

function notAdmin(): void
{
    if (isset($_SESSION["userRoles"]) && !in_array('admin', $_SESSION["userRoles"], true)) { //admin
        header("Location: /?controller=home&action=home");
    }
}

function notSeller(): void
{
    if (isset($_SESSION["userRoles"]) && !in_array('seller', $_SESSION["userRoles"], true)) { //seller
        header("Location: /?controller=home&action=home");
    }
}

function notUser(): void
{
    if (isset($_SESSION["userRoles"]) && !in_array('buyer', $_SESSION["userRoles"], true)) { //user
        header("Location: /?controller=home&action=home");
    }
}
