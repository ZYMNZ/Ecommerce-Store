<?php
include_once "Views/General/session.php";
notLoggedIn();
notUser();
//notAdmin();
$result = User::deleteUser($_GET['id']);
if ($result){
    header("Location: /?controller=user&action=viewSeller");
}

