<?php
include_once "Views/General/session.php";
noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'admin');
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<?php
include_once "Views/General/navbar.php";
?>

<h1>Admin</h1>
<br>
<br>
<table>
    <?php
    echo "<tr><td>&emsp;&emsp;Buyer</td><td></td><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href='/?controller=user&action=viewBuyers'><button>View...</button></a>";
    echo "<tr><td>&emsp;&emsp;Seller</td><td></td><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href='/?controller=user&action=viewSellers'><button>View...</button></a>";
    ?>
</table>
<?php
include_once "Views/General/footer.php";
?>
</body>
</html>