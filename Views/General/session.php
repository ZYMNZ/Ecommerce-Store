<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function notLoggedIn() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: /?controller=login&action=login");
    }
}
function notAdmin() {
    if (isset($_SESSION["group_id"]) && $_SESSION["group_id"][0] === 0) { //admin
        header("Location: /?controller=login&action=login");
    }
}
function notSeller() {
    if (isset($_SESSION["group_id"]) && $_SESSION["group_id"][1] === 0) { //seller
        header("Location: /?controller=home&action=home");
    }
}
function notUser() {
    if (isset($_SESSION["group_id"]) && $_SESSION["group_id"][2] === 0) { //user
        header("Location: /?controller=login&action=login");
    }
}
