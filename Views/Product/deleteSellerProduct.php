<?php
Product::deleteProduct($_GET['id']);
header("Location: ?controller=product&action=sellerProduct");
