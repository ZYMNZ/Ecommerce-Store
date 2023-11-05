<nav>

    <section id="navBar" class="width100Percent displayFlex">
        <section id="logo" class="height100Percent"> <img src="Views/images/logo2.png"></section>

<!--         adding home button if it's login page-->
        <?php
            function addHomeButtonNavBar() {
                global $controllerPrefix;
                global $action;
                if($controllerPrefix == "login" && $action == "login") {
        ?>
                    <section>
                        <a href="?controller=home&action=home">
                            <input type="button" value="Home" class="defaultButtonStyling borderNone navBarButton cursorPointer signButtons">
                        </a>
                    </section>
                    <?php
                }
            }
                    ?>
        <?php
            addHomeButtonNavBar();
        ?>


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
        function addCategoryButtonNavBar()
        {
            global $action,$controllerPrefix;

            if ($action=="home"&&$controllerPrefix="home"){
                ?>
                <section>
                    <select class="categoryNavBar cursorPointer">
                        <?php
                            //fetching from Database
                        ?>
                        <option>Programming</option>
                        <option>Graphic Design</option>
                    </select>
                </section>

                <?php
            }
        }
        ?>

        <?php
        addCategoryButtonNavBar();
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
                        <a href="?controller=login&action=login">
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

    </section>

</nav>
