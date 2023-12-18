<?php
include_once "Views/General/session.php";
?>
<!DOCTYPE html>
<html lang="en">
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
<div class="mainContentWrapper">
    <main>
        <?php
        include_once "Views/General/navbar.php";
        ?>
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
            if (!empty($dataToSend["products"])) {
                foreach ($dataToSend["products"] as $product) {
                    echo "<tr><div class='product'>";
                    echo "<div class='title'>" . htmlentities($product->getTitle(), ENT_QUOTES) . "</div>";
                    echo "<div class='description'>" . htmlentities($product->getDescription(),ENT_QUOTES) . "</div>";
                    echo "<div class='price'>$" . htmlentities(number_format($product->getPrice(), 2, '.', ','),ENT_QUOTES) . "</div>";
                    echo "<div><a href='?controller=product&action=view&id=" . htmlentities($product->getProductId(), ENT_QUOTES) . "' class='buy-button'>View</a></div>";
                    echo "</div></tr>";
                }
            } else {
                echo "<label class='title'>This category currently has no products</label>";
            }
            ?>
        </table>
    </main>
</div>
<?php
include_once "Views/General/footer.php";
?>
</body>
</html>