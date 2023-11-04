<html>
    <head>
        <title>Registration</title>
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
        <form action="" method="POST">
            <section class="loginRegistrationSection marginAuto">
                <label class="hintLabel displayBlock denseHintLabel">First Name:</label>
                <input type="text" name="firstName" class="inputField width100Percent"> <br/>
                <label class="hintLabel displayBlock denseHintLabel">Last Name:</label>
                <input type="text" name="lastName" class="inputField width100Percent"> <br/>
                <label class="hintLabel displayBlock denseHintLabel">Email:</label>
                <input type="text" name="email" class="inputField width100Percent"> <br/>
                <label class="hintLabel displayBlock denseHintLabel">Password:</label>
                <input type="text" name="password" class="inputField width100Percent"> <br/>
                <label class="hintLabel displayBlock denseHintLabel">Confirm Password:</label>
                <input type="text" name="confirmPassword" class="inputField width100Percent"> <br/>
            </section>

            <section class="signButtons marginAuto">
                <input type="submit" name="submit" value="Sign up" href="" class="defaultButtonStyling cursorPointer width100Percent borderNone">
                <a href="/?controller=login&action=login">
                    <input type="button" name="signIn" value="Sign in" href="/?controller=login&action=login" class="defaultButtonStyling cursorPointer width100Percent borderNone">
                </a> <br/>
            </section>
        </form>

        <?php
            include_once "Views/General/footer.php";
        ?>
    </body>
</html>