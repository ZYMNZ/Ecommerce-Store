<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/account.css"
    <link rel="stylesheet" type="text/css" href="Views/styles/home.css"
</head>

<nav>

    <section id="navBar" class="width100Percent displayFlex">
        <section id="logo" class="height100Percent"> <a href="?controller=home&action=home"><img src="Views/images/logo2.png"></a></section>

<!--         adding home button if it's login page-->
<!--        --><?php
//            function addHomeButtonNavBar() {
//                global $controllerPrefix;
//                global $action;
//                if($controllerPrefix == "login" && $action == "login") {
//        ?>
<!--                    <section>-->
<!--                        <a href="?controller=home&action=home">-->
<!--                            <input type="button" value="Home" class="defaultButtonStyling borderNone navBarButton cursorPointer signButtons">-->
<!--                        </a>-->
<!--                    </section>-->
<!--                    --><?php
//                }
//            }
//                    ?>
<!---->
<!--        --><?php
//            addHomeButtonNavBar();
//        ?>


<!--        --><?php
//            function addEditButtonNavBar()
//            {
//                global $action,$controllerPrefix;
//
//                if ($action=="home"&&$controllerPrefix="home"){
//        ?>
<!--                    <section>-->
<!--                        <a href="">-->
<!--                            <input type="button" value="Edit" class="borderNone cursorPointer navBarLanding navBarEditButton">-->
<!--                        </a>-->
<!--                    </section>-->
<!---->
<!--        --><?php
//                }
//            }
//        ?>
<!---->
<!--        --><?php
//            addEditButtonNavBar();
//        ?>

        <!-- adding a category  -->
        <?php
        global $action, $controllerPrefix;
        if ($action == "home" && $controllerPrefix = "home") {
            include_once "Views/General/category.php";
        }
        ?>

        <!-- adding sign up if it's landing page-->

        <?php
            function addSignUpButtonNavBar()
            {
                global $action;
                global $controllerPrefix;
                if ($controllerPrefix="home" &&$action == "home"){
        ?>
                    <section class="navBarLanding">
                        <a href="?controller=registration&action=registration">
                            <input type="button" value="Sign up" class="signUpButtonNavBar defaultButtonStyling navBarLanding cursorPointer borderNone navBarButton signButtons">
                        </a>
                    </section>

        <?php
                }
            }
        ?>
        <?php
            addSignUpButtonNavBar();
        ?>

<!--        adding sign in if it's landing page-->
        <?php
            function addSignInButtonNavBar()
            {
                global $action;
                global $controllerPrefix;
                if ($controllerPrefix="home" &&$action == "home"){
        ?>
                    <section>
                        <a href="/?controller=login&action=login">
                            <input type="button" value="Sign in" class=" defaultButtonStyling cursorPointer borderNone navBarButton signButtons">
                        </a>
                    </section>

        <?php
                }
            }
        ?>
        <?php
            addSignInButtonNavBar();
        ?>
        <?php
        if (session_status() == PHP_SESSION_ACTIVE) {
        ?>
            <div class="dropdown">
                <?php
                global $controllerPrefix, $action;
                    // session_start() has not been called
                    echo " <img id='account' src='Views/images/account.png''>";

                ?>
                <div class="dropdown-content">
                    <a href="#">Personal Info</a>
                    <?php
//                    var_dump($_SESSION['group_id'][1]);
                    if (isset($_SESSION['user_id']) && $_SESSION["group_id"][1] === 0) {
                        echo "<a href='/?controller=seller&action=register'>Register as a Seller</a>";
                    } else if ($_SESSION['user_id'] && $_SESSION["group_id"][1] === 1) {
                        echo "<a href='/?controller=product&action=sellerProduct'>View your products</a>";
                    }
                    ?>
                    <a href="/?controller=login&action=login">Logout</a>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
</nav>
