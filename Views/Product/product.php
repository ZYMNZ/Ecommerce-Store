<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/home.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/product.css">
</head>

<body>
<div class="navbar">
    <?php
    include_once "Views/General/navbar.php";
    ?>
</div>
<table>
    <?php
/*    foreach ($dataToSend as $product) {
        echo "<tr class='table-row'>";
        echo "<td class='table-title'>" . $product->getTitle() . "</td>";
        echo "<td class='table-description'>" . $product->getDescription() . "</td>";
        echo "<td class='table-price'>$" . $product->getPrice() . "</td>";
        echo "<td><a href='/?controller=product&action=view&id=" . $product->getProductId() . "' class='table-buy-button'>View</a></td>";
        echo "</tr>";
    }
    */?>
    <?php
    foreach ($dataToSend as $product) {
        echo "<tr><div class='product'>";
        echo "<div class='title'>" . $product->getTitle() . "</div>";
        echo "<div class='description'>" . $product->getDescription() . "</div>";
        echo "<div class='price'>$" . $product->getPrice() . "</div>";
        echo "<div><a href='/?controller=product&action=view&id=" . $product->getProductId() . "' class='buy-button'>View</a></div>";
        echo "</div></tr>";
    }
    ?>
</table>
<?php
include_once "Views/General/footer.php";
?>
</body>
</html>
