<html lang="en">
<head>
    <title>Registration</title>
    <!--Keep general styles css file at the top to let sub css files override the general one-->
    <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="Views/Registration/scripts/registrationValidation.js" type="text/javascript"></script>
    <script src="Views/General/scripts/errorValidation.js" type="text/javascript"></script>
</head>

<body>
    <div class="mainContentWrapper">
        <main>
            <?php
            include_once "Views/General/navbar.php";
            ?>
            <form action="?controller=registration&action=register" method="POST" id="registrationForm">
                <section class="loginRegistrationSection marginAuto">
                    <label class="hintLabel displayBlock denseHintLabel">First Name:</label>
                    <input type="text" name="firstName" class="inputField width100Percent" required> <br/>
                    <label class="hintLabel displayBlock denseHintLabel">Last Name:</label>
                    <input type="text" name="lastName" class="inputField width100Percent" required> <br/>
                    <label class="hintLabel displayBlock denseHintLabel">Email:</label>
                    <?php
                    if (isset($_SESSION['error']) && $_SESSION['error'] === 'email already exists') {
                        echo "<label class='invalidInputLabel'>The {$_SESSION['error']}</label>";
                        unset($_SESSION['error']);
                    }
                    ?>
                    <input type="text" name="email" class="inputField width100Percent" required> <br/>
                    <label name="emailCheck" class="displayBlock displayNone invalidInputLabel"></label>
                    <label class="hintLabel displayBlock denseHintLabel">Password:</label>
                    <label class="invalidInputLabel displayBlock displayNone" name="emptyPasswordLabel"></label>
                    <input type="password" name="password" class="inputField width100Percent" required> <br/>
                    <label class="hintLabel displayBlock denseHintLabel">Confirm Password:</label>
                    <input type="password" name="confirmPassword" class="inputField width100Percent" required> <br/>
                    <label class="invalidInputLabel displayBlock displayNone" name="notMatchingPasswordLabel"></label>
                </section>

                <section>

                </section>
                <section class="signButtons marginAuto">
                    <input type="submit" name="submit" value="Sign up" class="defaultButtonStyling cursorPointer width100Percent borderNone">
                    <a href="/?controller=login&action=login">
                        <input type="button" name="signIn" value="Sign in" class="defaultButtonStyling cursorPointer width100Percent borderNone">
                    </a> <br/>
                </section>
            </form>
        </main>
    </div>

    <?php
    include_once "Views/General/footer.php";
    ?>
</body>
</html>