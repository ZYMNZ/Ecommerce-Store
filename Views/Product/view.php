<?php
include_once "Views/General/session.php";
notLoggedIn();
notUser();
?>
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
<!--<div class="product">-->
<!--    <div class="title">--><?php //echo $dataToSend[0]->getTitle() ?><!--</div>-->
<!--    <div class="description">--><?php //echo $dataToSend[0]->getDescription() ?><!--</div>-->
<!--    <div class="price">$--><?php //echo $dataToSend[0]->getPrice()?><!--</div>-->
<!--    <button class="buy-button">Buy</button>-->
<!--</div>-->


    <section class="TopSection">
        <div class="title">
            <label><?php echo $dataToSend[0]-> getTitle() ?></label>
        </div>
        <div class="cart">
            <a href="?controller=&action=">
                <img src="Views/images/cart.png" class="cartImage">
            </a>
        </div>
    </section>

    <label><?php $dataToSend[0]->getName?></label>

</body>
</html>
