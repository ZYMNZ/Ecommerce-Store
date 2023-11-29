<?php
var_dump('cscsc');
$result = User::deleteUser($_GET['id']);
var_dump($result);
if ($result){
    header("Location: /?controller=user&action=viewSeller");
}

