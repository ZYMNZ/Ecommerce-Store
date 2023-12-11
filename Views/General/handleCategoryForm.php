<?php
$_SESSION['category'] = $_POST['category'];
header("Location: ?controller=product&action=product");
