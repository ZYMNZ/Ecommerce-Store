<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/account.css"
    <link rel="stylesheet" type="text/css" href="Views/styles/home.css"
</head>

<?php
global $action, $controllerPrefix;
?>
<nav>
    <section id="navBar" class="width100Percent displayFlex">
        <!-- adding logo  -->
        <section id="logo" class="height100Percent"> <a href="?controller=home&action=home"><img src="Views/images/logo2.png"></a></section>
        <!-- adding categories  -->
        <?php
        if (($controllerPrefix === "home" && $action === "home")
            || ($controllerPrefix === "product" && $action === "product")
            || ($controllerPrefix === "product" && $action === "view")
        ) {
            include_once "Views/General/category.php";
        }

        if (!isset($_SESSION['user_id']) && ($controllerPrefix !== "login" && $action !== "login") && ($controllerPrefix !== "registration" && $action !== "registration"))
        {
            ?>
            <!-- adding sign in  -->
            <section>
                <a href="/?controller=login&action=login">
                    <input type="button" value="Sign in" class=" defaultButtonStyling cursorPointer borderNone navBarButton signButtons">
                </a>
            </section>
            <?php
        }
        if (isset($_SESSION['user_id']))
        {
            ?>
            <!-- adding cart  -->
            <section class="height100Percent">
                <a href="/?controller=cart&action=cart">
                    <img src="Views/images/cart.png" class="height100Percent">
                </a>
            </section>
            <?php
        }
        //        echo "<p>" . isset($_SESSION['user_id']) . "</p>";

        if (isset($_SESSION['user_id'])) {
            ?>
            <!-- adding account icon  -->
            <div class="dropdown">
                <?php
                echo " <img id='account' src='Views/images/account.png''>";
                ?>
                <div class="dropdown-content">
                    <a href='/?controller=user&action=personalDetails'>Personal Info</a>
                    <?php
                    if (isset($_SESSION['user_id']) && !in_array('seller', $_SESSION["userRoles"], true)) {
                        echo "<a href='/?controller=user&action=sellerRegister'>Register as a Seller</a>";
                    } else if ($_SESSION['user_id'] && in_array('seller', $_SESSION["userRoles"], true)) {
                        echo "<a href='/?controller=product&action=sellerProduct'>View your products</a>";
                    }
                    if ($_SESSION['user_id'] && in_array('admin', $_SESSION["userRoles"], true))
                    {
                        ?>
                        <a href="/?controller=user&action=admin">Admin</a>
                        <?php
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
