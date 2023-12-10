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
            <div class="textAlignCenter">
                <button class=""><a href='/?controller=product&action=createSellerProduct'>Create</a></button>
            </div>


            <div>
                <?php
                if(count($dataToSend) > 0) {
                    foreach ($dataToSend as $product) {
                        echo "<tr><div class='product'>";
                        echo "<div class='title'>" . $product->getTitle() . "</div>";
                        echo "<div class='description'>" . $product->getDescription() . "</div>";
                        echo "<div class='price'>$" . $product->getPrice() . "</div>";
                        echo "<div><a href='/?controller=product&action=viewSellerProduct&id=" . $product->getProductId() . "' class='buy-button'>View</a></div>";
                        echo "<button><a href='/?controller=product&action=updateSellerProduct&id=" . $product->getProductId() . "' >Update</a></button>";
                        echo "<button><a href='/?controller=product&action=deleteSellerProduct&id=" . $product->getProductId() . "' >Delete</a></button>";
                        echo "</div></tr>";
                    }
                }
                ?>
            </div>
        </main>
    </div>

<?php
include_once "Views/General/footer.php";
?>
</body>
</html>
