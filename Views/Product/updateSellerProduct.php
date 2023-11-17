<?php
include_once "Views/General/session.php";
notLoggedIn();
notSeller();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
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
<?php
//echo $dataToSend[2][0]->getCategory();
echo ($dataToSend[2][0]->getCategoryId() === $dataToSend[1]->getCategoryId()) ? 'true01' : 'false01';
echo ($dataToSend[2][1]->getCategoryId() === $dataToSend[1]->getCategoryId()) ? 'true02' : 'false02';
?>
<form action="" method="post">
    <label>Title:<input class="form" type="text" name="title" value=<?php echo "'" . $dataToSend[0]->getTitle() . "'" ?>></label><br>
    <label>Description:<textarea name="description" rows="2" cols="50"><?php echo $dataToSend[0]->getDescription() ?></textarea></label><br>
    <label>Price:<input class="form" type="text" name="price" value=<?php echo "'" . $dataToSend[0]->getPrice() . "'" ?>></label><br>
    <label>
        <select name="category"  class="categoryNavBar cursorPointer">
            <option id="optionNone" value="None">None</option>
            <?php
            $categories = $dataToSend[2];
            foreach ($categories as $category) {
                echo "<p>".$categories->getCategoryId() === $dataToSend[1]->getCategoryId()."</p>";
                /*if ($categories->getCategoryId() === $dataToSend[1]->getCategoryId()) {
                    echo "<option value='" . $category->getCategory() . "' selected>" . $category->getCategory() . "</option>";
                    continue;
                }*/
                echo "<option value='" . $category->getCategory() . "'>" . $category->getCategory() . "</option>";
            }
            ?>
        </select>
    </label><br>
    <label>Submit:<input class="form" type="submit" name="submit"></label><br>
</form>
<?php
include_once "Views/General/footer.php";
?>
</body>
</html>

