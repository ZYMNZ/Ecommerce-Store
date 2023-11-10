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
</head>

<body>
<div class="navbar">
    <?php
    include_once "Views/General/navbar.php";
    ?>
</div>
<form action="/?controller=product&action=product" method="post">
    <label>Title:<input class="form" type="text" name="title"></label><br>
    <label>Description:<textarea name="description" rows="2" cols="50"></textarea></label><br>
    <label>Price:<input class="form" type="text" name="price"></label><br>
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
    <label><input class="form" type="submit" name="submit"></label><br>
</form>
<?php
include_once "Views/General/footer.php";
?>
</body>
</html>
