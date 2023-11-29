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
<?php
include_once "Views/General/navbar.php";
?>

<h1>Profile</h1>
<h2>Edit your First Name</h2>
<br>
<br>
<form action="/?controller=user&action=updatePersonalDetails" method="post">
    <label>&emsp;First Name:&emsp;&emsp;&emsp;
        <input type="text" name="firstName" value='<?php echo $data['user']->getFirstName() ?>'>
    </label>
    <br>
    <label>&emsp;Last Name:&emsp;&emsp;&emsp;
        <input type="text" name="lastName" value='<?php echo $data['user']->getLastName() ?>'>
    </label>
    <br>
    <label>&emsp;Description:&emsp;&emsp;&emsp;
        <input type="text" name="description" value='<?php echo $data['user']->getDescription() ?>'>
    </label>
    <br>
    <label>&emsp;Phone Number:&emsp;&emsp;&emsp;
        <input type="text" name="phoneNumber" value='<?php echo $data['user']->getPhoneNumber() ?>'>
    </label>
        <input type="submit" name="submit" value="Update">
</form>
<?php
include_once "Views/General/footer.php";
?>
</body>
</html>