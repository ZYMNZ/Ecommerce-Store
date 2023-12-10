<?php
include_once "Views/General/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create</title>
    <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/home.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/product.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="Views/Product/scripts/validateProductTextFields.js" type="text/javascript"></script>
    <script src="Views/General/scripts/errorValidation.js" type="text/javascript"></script>
</head>

<body>
    <div class="mainContentWrapper">
        <main>
            <?php
            include_once "Views/General/navbar.php";
            ?>
            <form action="?controller=product&action=submitProductCreation" method="post" enctype="multipart/form-data" class="productForm textAlignCenter">
                <label>Title:<input class="form" type="text" name="title"></label><br>
                <label class="invalidInputLabel displayBlock displayNone" name="titleErrorLabel"></label>
                <label>Description:<textarea name="description" rows="2" cols="50"></textarea></label><br>
                <label>Price:<input class="form" type="text" name="price"></label><br>
                <label class="invalidInputLabel displayBlock displayNone" name="emptyPriceErrorLabel"></label>
                <label class="invalidInputLabel displayBlock displayNone" name="notANumberPriceErrorLabel"></label>

                <select name="category"  class="categoryNavBar cursorPointer displayInlineBlock">
                    <option id="optionNone" value="None" selected>None</option>
                    <?php
                    $categories = $dataToSend;
                    foreach ($categories as $category) {
                        echo "<option value='" . $category->getCategoryId() . "'>" . $category->getCategory() . "</option>";
                    }
                    ?>
                </select>

                <br/>
                <label>
                    Upload an image for the product. The limit for the image size is 30 MB.:
                </label>

                <input type="file" name="productImage" value="Upload an image...">
                <label><input class="form" type="submit" name="submit"></label><br>
                <label class="invalidInputLabel displayBlock displayNone" name="categoryErrorLabel">Please choose a category</label>
            </form>
        </main>
    </div>

    <?php
    include_once "Views/General/footer.php";
    ?>
</body>
</html>

