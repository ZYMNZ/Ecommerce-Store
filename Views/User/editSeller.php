<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Seller</title>
    <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/home.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/account.css">

    <?php include_once "Views/General/navbar.php" ?>
</head>
<body>

<label>Admin</label>
<br>
<br>
<form action="/?controller=user&action=updateSeller&id= <?php $_GET['id'] ?>" method="POST">
    <label>FirstName
        <input type="text" name="firstName" value="<?php echo data['user']->getFirstName() ?>">
    </label>
    <br>
    <label>LastName
        <input type="text" name="lasttName" value="<?php echo data['user']->getLastName() ?>">
    </label>
    <br>
    <label>Email
        <input type="text" name="email" value="<?php echo data['user']->getEmail() ?>">
    </label>
    <br>
    <label>Description
        <input type="text" name="description" value="<?php echo data['user']->getDescription() ?>">
    </label>
    <br>
    <label>PhoneNumber
        <input type="text" name="phoneNumber" value="<?php echo data['user']->getPhoneNumber() ?>">
    </label>
    <br>

    <input name="submit" type="submit" value="Update">
</form>

<?php
include_once "Views/General/footer.php";
?>
</body>
</html>














