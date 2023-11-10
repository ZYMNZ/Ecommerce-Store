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
<form action="" method="post">
    <label>Title:<input class="form" type="text" name="title"></label><br>
    <label>Description:<textarea name="description" rows="2" cols="50"></textarea></label><br>
    <label>Price:<input class="form" type="text" name="price"></label><br>
    <label>Submit:<input class="form" type="submit" name="submit"></label><br>
</form>
<?php
include_once "Views/General/footer.php";
?>
</body>
</html>
