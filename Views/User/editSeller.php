<?php
include_once "Views/General/session.php";
?>
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
    <link rel="stylesheet" type="text/css" href="Views/styles/adminView.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="Views/General/scripts/errorValidation.js" type="text/javascript"></script>
    <script src="Views/User/scripts/editSeller.js" type="text/javascript"></script>
</head>
<body>
    <div class="mainContentWrapper">
        <main>
            <?php include_once "Views/General/navbar.php"; ?>
            <h1>Admin</h1>
            <br>
            <br>
            <form action="/?controller=user&action=updateSeller&id=<?php echo $_GET['id']; ?>" method="POST" id="editSellerForm">
                <label>First Name:
                    <input type="text" name="firstName" value="<?php echo $data['user']->getFirstName(); ?>">
                    <label class="invalidInputLabel displayBlock displayNone" style="margin-left: 137px;" name="firstNameErrorLabel"></label>
                </label>
                <br>
                <label>Last Name:
                    <input type="text" name="lastName" value="<?php echo $data['user']->getLastName(); ?>">
                    <label class="invalidInputLabel displayBlock displayNone" style="margin-left: 137px;" name="lastNameErrorLabel"></label>
                </label>
                <br>
                <label>Email:
                    <input type="text" name="email" value="<?php echo $data['user']->getEmail(); ?>">
                    <label class="invalidInputLabel displayBlock displayNone" style="margin-left: 137px;" name="emailErrorLabel"></label>
                </label>
                <br>
                <label>Description:
                    <input type="text" name="description" value="<?php echo $data['user']->getDescription(); ?>">
                </label>
                <br>
                <label>Phone Number:
                    <input type="text" name="phoneNumber" value="<?php echo $data['user']->getPhoneNumber(); ?>">
                    <label class="invalidInputLabel displayBlock displayNone" style="margin-left: 137px;" name="numberErrorLabel"></label>
                </label>
                <input name="submit" type="submit" value="Update">
            </form>
        </main>
    </div>

    <?php
        include_once "Views/General/footer.php";
    ?>
</body>
</html>














