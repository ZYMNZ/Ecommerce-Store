<?php
include_once "Views/General/session.php";
notLoggedIn();
notUser();
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
    $user->getDescription() === 'NULL' && $user->setDescription('None');
    $user->getPhoneNumber() === 'NULL' && $user->setPhoneNumber('None');
    echo "<tr><td>First Name:</td><td>&emsp;&emsp;" . $user->getFirstName() . "</td><td>";
    echo "<tr><td>Last Name:</td><td>&emsp;&emsp;" . $user->getLastName() . "</td><td>";
    echo "<tr><td>Description:</td><td>&emsp;&emsp;" . $user->getDescription() . "</td><td>";
    echo "<tr><td>Phone Number:</td><td>&emsp;&emsp;" . $user->getPhoneNumber() . "</td><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href='/?controller=user&action=editPersonalDetails'><button>Edit...</button></a>";
    echo "<tr><td>Password:</td><td>&emsp;&emsp;********</td><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href='/?controller=user&action=changePassword'><button>Change...</button></a>";
    ?>
</table>
<?php
include_once "Views/General/footer.php";
?>
</body>
</html>