<?php
include_once "Views/General/session.php";
$result = User::deleteUser($_GET['id']);
if ($result){
    header("Location: /?controller=user&action=viewBuyers");
}

