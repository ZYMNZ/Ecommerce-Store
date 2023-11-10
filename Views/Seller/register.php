<html>
<head>
    <title>Seller Registration</title>
    <!--Keep general styles css file at the top to let sub css files override the general one-->
    <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
</head>
<body>
<?php
include_once "Views/General/navbar.php";
?>
<section>
    <header class="header">
        <label class="headerFont">Welcome,</label><br>
        <label style="font-size: 30px" class="headerFont">Sign up for free as a Seller!!!</label>
    </header>
</section>
<section>
    <form action="/?controller=seller&action=validateRegistration" method="post">
        <section class="loginRegistrationSection marginAuto">
            <label style="font-size: 30px" class="hintLabel displayBlock">Please enter your current password to sign up
                <input type="password" name="password" class="inputField width100Percent" placeholder="password">
            </label><br>
            <input type="submit" name="submit" value="Sign up" class="defaultButtonStyling cursorPointer width100Percent borderNone">
        </section>
    </form>
</section>
<?php
include_once "Views/General/footer.php";
?>
</body>
</html>