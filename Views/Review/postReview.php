<?php
    if(!isset($_GET["id"]) || !isset($_POST["review"])) {
        header("Location: /?controller=general&action=error");
    }
    include_once "Views/General/session.php";
    Review::insertReview($_POST);
    header("Location: /?controller=product&action=view&id=" . $_GET["id"]);
?>