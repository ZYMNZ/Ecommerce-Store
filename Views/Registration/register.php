<?php

    User::registerUser($_POST);
    header("Location: /?controller=login&action=login");

?>