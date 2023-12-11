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
    <div class="mainContentWrapper">
        <main>
            <?php

            include_once "Views/General/navbar.php";
            ?>
            <!--<div class="product">-->
            <!--    <div class="title">--><?php //echo $dataToSend[0]->getTitle() ?><!--</div>-->
            <!--    <div class="description">--><?php //echo $dataToSend[0]->getDescription() ?><!--</div>-->
            <!--    <div class="price">$--><?php //echo $dataToSend[0]->getPrice()?><!--</div>-->
            <!--    <button class="buy-button">Buy</button>-->
            <!--</div>-->


            <section class="TopSection">
                <div class="title backgroundColorD9D9D9">
                    <label><?php echo $dataToSend["product"]-> getTitle() ?></label>
                </div>
            </section>

            <div class="creatorName">

                <label><?php
                    $sellerName = $dataToSend["product"]->getUserName($_GET['id']);
                    $name = explode(" ", $sellerName);
                    echo ucfirst($name[0]) ." ". ucfirst($name[1]);
                    ?></label>
            </div>

            <section class="productBodySection marginAuto displayFlex">
                <div class="productImageDiv displayInlineFlex backgroundColorD9D9D9">
                    <img src="Views/images/java.png" rel="JAVA IMAGE" class="productImage">
                </div>
                <section class="productPriceBuySection displayFlex">
                    <div class="productPriceDiv">
                        <label>
                            <?php
                            echo "$" . number_format($dataToSend["product"]->getPrice(), 2, '.', ',');
                            ?>
                        </label>
                    </div>
                    <?php
                    if (!isset($_SESSION['user_id'])) {
                        echo "<h3>Must be logged in to purchase</h3>";
                    } else {
                        ?>
                        <a href='<?php echo "?controller=cart&action=addToCart&id=" . $dataToSend["product"]-> getProductId() ?>' class="buyButtonAnchor backgroundColorD9D9D9">
                            Add to Cart
                        </a>
                        <?php
                    }
                    ?>
                </section>
            </section>

            <div class="productDescriptionDiv backgroundColorD9D9D9">
                <p>
                    <?php
                    echo $dataToSend["product"]->getDescription();
                    ?>
                </p>
            </div>


            <section class="commentsSection">
                <?php
                if (isset($_SESSION['user_id']) && $dataToSend["product"]->getUserId() !== $_SESSION['user_id']) {
                ?>
                <div class="commentsHeaderDiv">
                    <label class="reviewHeader fontWeightBold">Reviews</label>
                </div>
                <div class="reviewsDiv">
                    <form action="/?controller=review&action=postReview&id=<?php
                    echo $dataToSend["product"]->getProductId();
                    ?>"
                          method="POST">
                        <div class="postReviewDiv">
                            <textarea name="review" cols="100" rows="4" class="reviewTextArea displayBlock"></textarea>
                            <div class="postReviewButtonDiv displayFlex">
                                <input type="submit" class="postReviewButton cursorPointer" value="Post Review">
                            </div>
                        </div>
                    </form>
                    <?php
                }
                ?>

                    <?php
                    foreach($dataToSend["reviewsAndUsers"] as $review) {
                        echo "<div class='review backgroundColorD9D9D9'>"
                            . "<div class='reviewPoster'>"
                            . "<label class='fontWeightBold'>" . $review["user"]->getFirstName()
                            . " " . $review["user"]->getLastName() . "</label>"
                            . "</div>"
                            . "<div class='reviewParagraph'>"
                            . "<label>" . $review["review"]->getReview() . "</label>"
                            . "</div>"
                            . "</div>";
                    }
                    ?>
                </div>
            </section>
        </main>
    </div>

    <?php
        include_once "Views/General/footer.php";
    ?>
</body>
</html>
