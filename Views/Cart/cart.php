<?php
include_once "Views/General/session.php";

//include_once "Models/Order.php";
//$order = new Order();
//$order->displayCart($_SESSION['user_id']);
//var_dump($order);
?>

<html lang="en">
    <head>
        <title>Shopping Cart</title>
        <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/home.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/cart.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </head>

    <?php $subPrice=0 ?>
    <body>
    <div class="mainContentWrapper">
        <main>
            <?php
            include_once "Views/General/navbar.php";
            ?>

            <div style="width: 50%">
                <header class="shoppingCartHeader fontWeightBold">
                    <label>Shopping Cart</label>
                </header>

                <div class="wrapper">
<!--                    --><?php //var_dump($dataToSend); ?>

                    <?php foreach ($dataToSend as $data ) : ?>

                    <div class="cartItemBlock">
                        <div class="firstHalfCartItemBlock displayInlineBlock">
                            <label class="fontWeightBold displayBlock categoryLabel"><?php echo $data['category'] ?></label>
                            <label class="productTitle" name="productTitle"> <?php echo $data['title'] ?></label>
                        </div>

                        <div class="secondHalfCartItemBlock displayInlineBlock">
                            <div class="expandButtonContainer displayInlineFlex width100Percent justifyContentEnd">
                                <div class="cartItemExpandButton cursorPointer textAlignCenter displayInlineBlock">
                                    <a class="deleteButton" href="?controller=cart&action=deleteCartProduct&id=<?php echo $data['productId'] ?>"><button class="deleteButton">Delete</button></a>

                                </div>
                            </div>


                            <div class="priceContainer displayInlineFlex width100Percent justifyContentEnd">
                                <div>
                                    <label name="price"><?php echo $data['price'] ?></label>
                                </div>
                            </div>
                            <?php $subPrice +=$data['price']; ?>
                        </div>

                        <div class="displayBlock requestService" >
                            <label>Request for this service:</label>
                        </div>

                        <div class="displayBlock textAreaDiv" >
                            <textarea name="requestService" ></textarea>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>




            <div class="priceContainerBlock">
                <div class="subTotal">
                    <label>Subtotal</label>
                    <label>CAD <?php echo $subPrice;?></label>

                </div>

                <div class="estimatedTax" style="top: 8%">
                    <label>Estimated Tax</label>
                    <label>CAD <?php $estimatedtax = number_format($subPrice * 0.15,2); echo $estimatedtax;?></label>

                </div>

                <div class="totalPrice">
                    <label>Total Price</label>
                    <label>CAD <?php echo ($subPrice + $estimatedtax); ?></label>
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