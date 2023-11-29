<?php
    include_once "Views/General/session.php";
    Review::insertReview($_POST);
    header("Location: /?controller=product&action=view&id=" . $_GET["id"]);
?>