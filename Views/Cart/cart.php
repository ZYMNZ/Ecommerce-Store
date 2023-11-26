<?php
include_once "Views/General/session.php";
notLoggedIn();
notUser();
?>

<html>
    <head>
        <title>Shopping Cart</title>
        <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/home.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/cart.css">
    </head>

    <body>
        <?php
            include_once "Views/General/navbar.php";
        ?>

        <section>
            <header class="shoppingCartHeader fontWeightBold">
                <label>Shopping Cart</label>
            </header>

            <section class="cartItemBlock">
                <section class="firstHalfCartItemBlock displayInlineBlock">
                    <label class="fontWeightBold displayBlock categoryLabel">Category</label>
                </section>

                <section class="secondHalfCartItemBlock displayInlineBlock">
                    <div class="expandButtonContainer displayInlineFlex width100Percent justifyContentEnd">
                        <div class="cartItemExpandButton cursorPointer textAlignCenter displayInlineBlock">
                            <img src="Views/images/downArrow.png" class="expandArrow">
                        </div>
                    </div>


                    <div class="priceContainer displayInlineFlex width100Percent justifyContentEnd">
                        <div>
                            <label>CAD $26.98</label>
                        </div>
                    </div>

                </section>
            </section>
        </section>
    </body>
</html>