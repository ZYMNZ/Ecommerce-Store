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
    <link rel="stylesheet" type="text/css" href="Views/styles/account.css"
</head>
<body>
    <div class="mainContentWrapper">
        <main>
            <?php
            include_once "Views/General/navbar.php";
            ?>

            <h1>Profile</h1>
            <h2>Edit your Information</h2>
            <br>
            <br>
            <table>
                <?php
                $user = $data['user'];
                echo "<tr><td>First Name:</td><td>&emsp;&emsp;" . htmlentities($user->getFirstName(), ENT_QUOTES) . "</td><td>";
                echo "<tr><td>Last Name:</td><td>&emsp;&emsp;" . htmlentities($user->getLastName(), ENT_QUOTES) . "</td><td>";
                if (in_array('seller', $_SESSION['userRoles'], true)) {
                    echo "<tr><td>Description:</td><td>&emsp;&emsp;" . htmlentities($user->getDescription(), ENT_QUOTES) . "</td><td>";
                    echo "<tr><td>Phone Number:</td><td>&emsp;&emsp;" . htmlentities($user->getPhoneNumber(), ENT_QUOTES) . "</td><td>";
                }
                echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href='/?controller=user&action=editPersonalDetails'><button>Edit...</button></a>";
                echo "<tr><td>Password:</td><td>&emsp;&emsp;********</td><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href='/?controller=user&action=changePassword'><button>Change...</button></a>";
                ?>
            </table>
        </main>
    </div>


    <?php
    include_once "Views/General/footer.php";
    ?>
</body>
</html>