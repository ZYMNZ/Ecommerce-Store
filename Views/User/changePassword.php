<?php
include_once "Views/General/session.php";
noAccess($_SESSION['user_id'], $_SESSION['userRoles'], 'admin');

?>

<html lang="en">
<head>
    <title>Personal Details</title>
    <link rel="stylesheet" type="password/css" href="Views/styles/generalstyles.css">
    <link rel="stylesheet" type="password/css" href="Views/styles/navbar.css">
    <link rel="stylesheet" type="password/css" href="Views/styles/login.css">
    <link rel="stylesheet" type="password/css" href="Views/styles/footer.css">
    <link rel="stylesheet" type="password/css" href="Views/styles/home.css">
    <link rel="stylesheet" type="password/css" href="Views/styles/account.css">
</head>
<body>
<?php
include_once "Views/General/navbar.php";
?>

<h1>Profile</h1>
<h2>Edit your First Name</h2>
<br>
<br>
<form action="/?controller=user&action=updatePassword" method="post">
    <label>&emsp;Current Password:
        <input type="password" name="currentPassword">
    </label>
    <br>
    <label class="wrongPassword">&emsp;New Password:&emsp;
        <input type="password" name="newPassword">
    </label>
    <br>
    <label>&emsp;Confirm Password:
        <input type="password" name="confirmPassword">
    </label>&emsp;
    <input type="submit" name="submit" value="Confirm">
</form>
<?php
include_once "Views/General/footer.php";
?>
</body>
</html>