<?php
include_once "Views/General/session.php";
?>

<html lang="en">
<head>
    <title>Personal Details</title>
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
    <script src="Views/User/scripts/editBuyer.js" type="text/javascript"></script>
    <script src=""></script>
</head>
<body>
    <div class="mainContentWrapper">
        <main>
            <?php
            include_once "Views/General/navbar.php";
            ?>

            <h1>Admin</h1>
            <br>
            <br>
            <form action='<?php echo "/?controller=user&action=updateBuyer&id=" . htmlentities($_GET['id'], ENT_QUOTES) ?>' method="post" id="editBuyerForm">
                <label>First Name:
                    <input type="text" name='firstName' value='<?php echo htmlentities($data['user']->getFirstName(), ENT_QUOTES); ?>'>
                    <label class="invalidInputLabel displayBlock displayNone" style="margin-left: 137px;" name="firstNameErrorLabel"></label>
                </label>
                <br>
                <label>Last Name:
                    <input type="text" name='lastName' value='<?php echo htmlentities($data['user']->getLastName(), ENT_QUOTES); ?>'>
                    <label class="invalidInputLabel displayBlock displayNone" style="margin-left: 137px;" name="lastNameErrorLabel"></label>
                </label>
                <br>
                <label>Email:
                    <input type="text" name='email' value='<?php echo htmlentities($data['user']->getEmail(), ENT_QUOTES); ?>'>
                    <label class="invalidInputLabel displayBlock displayNone" style="margin-left: 137px;" name="emailErrorLabel"></label>

                </label>
                <input type="submit" name="submit" value="Update">
            </form>
        </main>
    </div>

    <?php
        include_once "Views/General/footer.php";
    ?>
</body>
</html>