<?php
include_once "Views/General/session.php";
notLoggedIn();
notUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product View</title>
    <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/home.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/productview.css">
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
        <div class="title backgroundColorD9D9D9">
            <label><?php echo $dataToSend[0]-> getTitle() ?></label>
        </div>
        <div class="cart">
            <a href="?controller=cart&action=cart">
                <img src="Views/images/cart.png" class="cartImage">
            </a>
        </div>
    </section>

    <div class="creatorName">
        <label><?php echo $dataToSend[0]->getUserName()?> Conan Edugawa</label>
    </div>

    <section class="productBodySection marginAuto displayFlex">
        <div class="productImageDiv displayInlineFlex backgroundColorD9D9D9">
            <img src="Views/images/java.png" rel="JAVA IMAGE" class="productImage">
        </div>
        <section class="productPriceBuySection displayFlex">
                <div class="productPriceDiv">
                    <label>
                        <?php
                            echo "$" . number_format($dataToSend[0]->getPrice(), 2, '.', ',');
                        ?>
                    </label>
                </div>
                <a href="" class="buyButtonAnchor backgroundColorD9D9D9">
                    Add to Cart
                </a>
        </section>
    </section>

    <div class="productDescriptionDiv backgroundColorD9D9D9">
        <p>
            <?php
                echo $dataToSend[0]->getDescription();
            ?>
        </p>
    </div>


    <section class="commentsSection">
        <div class="commentsHeaderDiv">
            <label class="reviewHeader fontWeightBold">Reviews</label>
        </div>

        <div class="reviewsDiv">
            <form action="" method="POST">
                <div class="postReviewDiv">
                    <textarea name="review" cols="100" rows="4" class="reviewTextArea displayBlock"></textarea>
                    <div class="postReviewButtonDiv displayFlex">
                        <input type="submit" class="postReviewButton cursorPointer" value="Post Review">
                    </div>
                </div>
            </form>


            <div class="review backgroundColorD9D9D9">
                <div class="reviewPoster">
                    <label class="fontWeightBold">Review Poster's Full Name</label>
                </div>

                <div class="reviewParagraph">
                    <label>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy
                        text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it to make a type specimen
                        book. It has survived not only five centuries, but
                        also the leap into electronic typesetting, remaining
                        essentially unchanged.
                    </label>
                </div>
            </div>

        </div>
    </section>
</body>
</html>
