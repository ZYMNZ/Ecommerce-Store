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
    <link rel="stylesheet" type="text/css" href="Views/styles/home.css"
    <link rel="stylesheet" type="text/css" href="Views/styles/account.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="Views/General/scripts/errorValidation.js" type="text/javascript"></script>
    <script src="Views/User/scripts/personalDetails.js" type="text/javascript"></script>

</head>
<body>
<div class="mainContentWrapper">
    <main>
        <?php
        include_once "Views/General/navbar.php";
        ?>

        <h1>Profile</h1>
        <h2>Edit your First Name</h2>
        <br>
        <br>
        <form action="/?controller=user&action=updatePersonalDetails" method="post" id="formPersonalDetails">
            <label>&emsp;First Name:&emsp;&emsp;&emsp;
                <input type="text" name="firstName" value='<?php echo htmlentities($data['user']->getFirstName(),ENT_QUOTES) ?>'>
                <label class="invalidInputLabel displayBlock displayNone" style="margin-left: 137px;" name="firstNameErrorLabel"></label>
            </label>
            <br>
            <label>&emsp;Last Name:&emsp;&emsp;&emsp;
                <input type="text" name="lastName" value='<?php echo htmlentities($data['user']->getLastName(),ENT_QUOTES) ?>'>
                <label class="invalidInputLabel displayBlock displayNone" style="margin-left: 137px;" name="lastNameErrorLabel"></label>
            </label>
            <?php
            if (in_array('seller', $_SESSION['userRoles'], true)) {
                ?>
                <br>
                <label>&emsp;Description:&emsp;&emsp;&emsp;
                    <input type="text" name="description" value='<?php echo htmlentities($data['user']->getDescription(),ENT_QUOTES) ?>'>

                </label>
                <br>
                <label>&emsp;Phone Number:&emsp;&emsp;&emsp;
                    <input type="text" id="phoneNumber" name="phoneNumber" value='<?php echo htmlentities($data['user']->getPhoneNumber(),ENT_QUOTES) ?>'>
                    <label class="invalidInputLabel displayBlock displayNone" style="margin-left: 137px;" name="notANumberErrorLabel"></label>
                </label>
                <br>
                <?php
            }
            ?>
            <input type="submit" name="submit" value="Update">
        </form>

    </main>
</div>
<?php
include_once "Views/General/footer.php";
?>
</body>
</html>