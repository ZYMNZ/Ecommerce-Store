<html>
    <head>
        <title>Login</title>
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
                <label class="headerFont">Welcome</label>
            </header>
            <section id="loginSection" class=" marginAuto">
                <label class="hintLabel displayBlock">Email:</label>
                <input type="text" name="email" class="inputField width100Percent"> <br/>
                <label class="hintLabel displayBlock">Password:</label>
                <input type="password" name="password" class="inputField width100Percent"> <br/>
            </section>
            <section class="signButtons marginAuto">
                <input type="submit" name="submit" value="Sign in" class="defaultButtonStyling cursorPointer width100Percent borderNone"> <br/>
                <input type="button" name="signUp" value="Sign up" class="defaultButtonStyling cursorPointer width100Percent borderNone">
            </section>
        </section>
        <footer>
            <section class="footer width100Percent">

            </section>
        </footer>
    </body>
</html>