<?php
include_once "Views/General/session.php";
notLoggedIn();
notSeller();
?>
<!DOCTYPE html>
<html>
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
</head>

<body>
<div class="navbar">
    <?php
    include_once "Views/General/navbar.php";
    ?>
</div>
<form action="?controller=product&action=submitProductCreation" method="post" class="productForm">
    <label>Title:<input class="form" type="text" name="title"></label><br>
    <label class="invalidInputLabel displayBlock displayNone" name="titleErrorLabel"></label>
    <label>Description:<textarea name="description" rows="2" cols="50"></textarea></label><br>
    <label>Price:<input class="form" type="text" name="price"></label><br>
    <label class="invalidInputLabel displayBlock displayNone" name="emptyPriceErrorLabel"></label>
    <label class="invalidInputLabel displayBlock displayNone" name="notANumberPriceErrorLabel"></label>
    <label>
        <select name="category"  class="categoryNavBar cursorPointer">
            <option id="optionNone" value="None" selected>None</option>
            <?php
            $categories = $dataToSend;
            foreach ($categories as $category) {
                echo "<option value='" . $category->getCategory() . "'>" . $category->getCategory() . "</option>";
            }
            ?>
        </select>
    </label>
    <label class="invalidInputLabel displayBlock displayNone" name="categoryErrorLabel">Please choose a category</label>
    <label><input class="form" type="submit" name="submit"></label><br>
</form>
<?php
include_once "Views/General/footer.php";
?>
</body>
</html>
