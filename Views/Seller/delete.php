<?php
include_once "Views/General/session.php";
//sellerGroup();
Product::deleteProduct($_GET['id']);
header("Location: ?controller=seller&action=products");

?>
<?php
