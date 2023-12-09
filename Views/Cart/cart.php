<?php
include_once "Views/General/session.php";


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
    <div class="mainContentWrapper">
        <main>
            <?php
            include_once "Views/General/navbar.php";
            ?>

            <!--        style="  float: inline-start;"-->
            <div style="width: 50%">
                <header class="shoppingCartHeader fontWeightBold">
                    <label>Shopping Cart</label>
                </header>

                <div class="wrapper">

                    <div class="cartItemBlock">
                        <div class="firstHalfCartItemBlock displayInlineBlock">
                            <label class="fontWeightBold displayBlock categoryLabel">Category</label>
                            <label class="productTitle" name="productTitle"><?php ?> Title of Product</label>
                        </div>

                        <div class="secondHalfCartItemBlock displayInlineBlock">
                            <div class="expandButtonContainer displayInlineFlex width100Percent justifyContentEnd">
                                <div class="cartItemExpandButton cursorPointer textAlignCenter displayInlineBlock">
                                    <img src="Views/images/downArrow.png" class="expandArrow">
                                </div>
                            </div>


                            <div class="priceContainer displayInlineFlex width100Percent justifyContentEnd">
                                <div>
                                    <label name="price"><?php ?>CAD $26.98</label>
                                </div>
                            </div>

                        </div>

                        <div class="displayBlock requestService" >
                            <label>Request for this service:</label>
                        </div>

                        <div class="displayBlock textAreaDiv">
                            <textarea name="requestService" ></textarea>
                        </div>
                    </div>
                    <!--                -->

                    <div class="cartItemBlock">
                        <div class="firstHalfCartItemBlock displayInlineBlock">
                            <label class="fontWeightBold displayBlock categoryLabel">Category</label>
                            <label class="productTitle" name="productTitle"><?php ?> Title of Product</label>
                        </div>

                        <div class="secondHalfCartItemBlock displayInlineBlock">
                            <div class="expandButtonContainer displayInlineFlex width100Percent justifyContentEnd">
                                <div class="cartItemExpandButton cursorPointer textAlignCenter displayInlineBlock">
                                    <img src="Views/images/downArrow.png" class="expandArrow">
                                </div>
                            </div>


                            <div class="priceContainer displayInlineFlex width100Percent justifyContentEnd">
                                <div>
                                    <label name="price"><?php ?>CAD $26.98</label>
                                </div>
                            </div>

                        </div>

                        <div class="displayBlock requestService" >
                            <label>Request for this service:</label>
                        </div>

                        <div class="displayBlock textAreaDiv">
                            <textarea name="requestService" ></textarea>
                        </div>
                    </div>

                </div>
            </div>




            <div class="priceContainerBlock">
                <div class="subTotal">
                    <label>Subtotal</label>
                    <label>CAD $215.98 <?php ?></label>
                </div>

                <div class="estimatedTax" style="top: 8%">
                    <label>Estimated Tax</label>
                    <label>CAD $17.00 <?php ?></label>
                </div>

                <div class="totalPrice">
                    <label>Total Price</label>
                    <label>CAD $232.98 <?php ?></label>
                </div>
                <div style="padding: 310px 0 0;">
                    <a href="/?controller=order&action=orderConfirmed"><button class="confirmButton"></button></a>
                </div>
            </div>
        </main>
    </div>

    <?php
        include_once "Views/General/footer.php";
    ?>
    </body>
</html>