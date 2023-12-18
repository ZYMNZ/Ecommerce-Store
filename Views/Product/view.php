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


            <section class="TopSection">
                <div class="title backgroundColorD9D9D9">
                    <label><?php echo htmlentities($dataToSend["product"]->getTitle(), ENT_QUOTES); ?></label>
                </div>
            </section>

            <div class="creatorName">

                <label><?php
                    $sellerName = $dataToSend["product"]->getUserName($_GET['id']);
                    $name = explode(" ", $sellerName);
                    echo htmlentities(ucfirst($name[0]), ENT_QUOTES) ." ". htmlentities(ucfirst($name[1]), ENT_QUOTES);
                    ?></label>
            </div>

            <section class="productBodySection marginAuto displayFlex">
                <div class="productImageDiv displayInlineFlex backgroundColorD9D9D9">
                    <img src="<?php
                    $productImagePath = $dataToSend["product"]->getProductImagePath();
                    if(strlen($productImagePath) > 0)
                    {
                        echo htmlentities($productImagePath, ENT_QUOTES);
                    }
                    else {
                        echo "Views/images/no-photo.png";
                    }
                    ?>" class="productImage">
                </div>
                <section class="productPriceBuySection displayFlex">
                    <div class="productPriceDiv">
                        <label>
                            <?php
                            echo "$" . htmlentities(number_format($dataToSend["product"]->getPrice(), 2, '.', ','), ENT_QUOTES);
                            ?>
                        </label>
                    </div>
                    <?php
                    if (!isset($_SESSION['user_id'])) {
                        echo "<h3>Must be logged in to purchase</h3>";
                    } else {
                        ?>
                        <a href='<?php echo "?controller=cart&action=addToCart&id=" . htmlentities($dataToSend["product"]->getProductId(), ENT_QUOTES) ?>' class="buyButtonAnchor backgroundColorD9D9D9">
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
                    echo htmlentities($dataToSend["product"]->getDescription(), ENT_QUOTES);
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
                    <form action="?controller=review&action=postReview&id=<?php
                    echo htmlentities($dataToSend["product"]->getProductId(), ENT_QUOTES);
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
                            . "<label class='fontWeightBold'>" . htmlentities($review["user"]->getFirstName(), ENT_QUOTES)
                            . " " . htmlentities($review["user"]->getLastName(), ENT_QUOTES) . "</label>"
                            . "</div>"
                            . "<div class='reviewParagraph'>"
                            . "<label>" . htmlentities($review["review"]->getReview(), ENT_QUOTES) . "</label>"
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
