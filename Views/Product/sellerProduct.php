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
            if (count($dataToSend) == 0) {
                echo "<h1>Create your product with the create button</h1>";
            }
            ?>
            <div class="textAlignCenter">
                <button class=""><a href='/?controller=product&action=createSellerProduct'>Create</a></button>
            </div>


            <div>
                <?php
                if(count($dataToSend) > 0) {
                    foreach ($dataToSend as $product) {
                        echo "<tr><div class='product'>";
                        echo "<div class='title'>" . htmlentities($product->getTitle(), ENT_QUOTES) . "</div>";
                        echo "<div class='description'>" . htmlentities($product->getDescription(), ENT_QUOTES) . "</div>";
                        echo "<div class='price'>$" . htmlentities(number_format($product->getPrice(), 2, '.', ','), ENT_QUOTES) . "</div>";
                        echo "<div><a href='/?controller=product&action=viewSellerProduct&id=" . htmlentities($product->getProductId(), ENT_QUOTES) . "' class='buy-button'>View</a></div>";
                        echo "<button><a href='/?controller=product&action=updateSellerProduct&id=" . htmlentities($product->getProductId(), ENT_QUOTES) . "' >Update</a></button>";
                        echo "<button><a href='/?controller=product&action=deleteSellerProduct&id=" . htmlentities($product->getProductId(), ENT_QUOTES) . "' >Delete</a></button>";
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
