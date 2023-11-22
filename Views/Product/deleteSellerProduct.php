<?php
include_once "Views/General/session.php";
//sellerGroup();
Product::deleteProduct($_GET['id']);
header("Location: ?controller=product&action=sellerProduct");

?>
<?php
