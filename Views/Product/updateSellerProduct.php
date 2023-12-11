<?php
include_once "Views/General/session.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update</title>
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
            <?php
            //echo $dataToSend[2][0]->getCategory();
            //echo ($dataToSend[2][0]->getCategoryId() === $dataToSend[1]->getCategoryId()) ? 'true01' : 'false01';
            //echo ($dataToSend[2][1]->getCategoryId() === $dataToSend[1]->getCategoryId()) ? 'true02' : 'false02';
            ?>
            <form action="/?controller=product&action=submitProductUpdate&id=<?php echo $dataToSend[0]->getProductId() . "\""; ?> enctype="multipart/form-data" class="textAlignCenter" id="productFormId" method="post">
            <label>Title:<input class="form" type="text" name="title" value=<?php echo "'" . $dataToSend[0]->getTitle() . "'" ?>></label><br>
            <label class="invalidInputLabel displayBlock displayNone" name="titleErrorLabel"></label>
            <label>Description:<textarea name="description" rows="2" cols="50"><?php echo $dataToSend[0]->getDescription() ?></textarea></label><br>
            <label>Price:<input class="form" type="text" name="price" value=<?php echo "'" . $dataToSend[0]->getPrice() . "'" ?>></label><br>
            <label class="invalidInputLabel displayBlock displayNone" name="emptyPriceErrorLabel"></label>
            <label class="invalidInputLabel displayBlock displayNone" name="notANumberPriceErrorLabel"></label>

            <label>
                <select name="category" class="categoryNavBar cursorPointer">
                    <option id="optionNone" value="None">None</option>
                    <?php
                    // Get the list of categories from the data that was sent from the controller
                    // So that we can use it in the category dropdown (to update the product)
                    $categories = $dataToSend[1];
                    // Store the current product's category so that
                    // We can check whether this product's category
                    // Matches any category in the $categories variable
                    // When they are listed in the dropdown
                    foreach ($categories as $category) {
//                echo "<p>".$categories->getCategoryId() === $dataToSend[1]->getCategoryId()."</p>";
                        /*if ($categories->getCategoryId() === $dataToSend[1]->getCategoryId()) {
                            echo "<option value='" . $category->getCategory() . "' selected>" . $category->getCategory() . "</option>";
                            continue;
                        }*/

                        // List all the options of categories
                        // If the category of the product to update is
                        // Equal to the category currently being put in the
                        // Dropdown, it will put the selected option for that dropdown option
                        echo "<option value='" . $category->getCategoryId() . "' "
                            . (($category->getCategoryId() == $dataToSend[0]->getCategoryId()) ? "selected" : ""). " >"
                            . $category->getCategory()
                            . "</option>";
                    }
                    ?>
                </select>
                <label class="invalidInputLabel displayBlock displayNone" name="categoryErrorLabel">Please choose a category</label>

            </label><br>
            <label>
                Upload an image for the product. The limit for the image size is 30 MB. Only images of types .jpg, .jpeg and .png are accepted:
            </label>

            <input type="file" name="productImage" value="Upload an image..." accept=".png, .jpg, .jpeg"> <br/>
            <label class="invalidInputLabel displayBlock displayNone" name="fileSizeErrorLabel"></label>
            <label class="invalidInputLabel displayBlock displayNone" name="fileTypeErrorLabel"></label>
            <label>Submit:<input class="form" type="submit" name="submit"></label><br>

            </form>
        </main>
    </div>

<?php
include_once "Views/General/footer.php";
?>
</body>
</html>

