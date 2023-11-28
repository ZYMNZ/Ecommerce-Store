<?php
include_once "Views/General/session.php";
notLoggedIn();
notUser();
//notAdmin();
User::deleteUserFromUserRole($_GET['id']);
