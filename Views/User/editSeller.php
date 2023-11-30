<?php
include_once "Views/General/session.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Seller</title>
    <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/home.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/account.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/adminView.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<?php include_once "Views/General/navbar.php"; ?>
<h1>Admin</h1>
<br>
<br>
<?php
$data['user']->getDescription() === 'NULL' && $data['user']->setDescription('None');
$data['user']->getPhoneNumber() === 'NULL' && $data['user']->setPhoneNumber('None');
?>
<form action="/?controller=user&action=updateSeller&id=<?php echo $_GET['id']; ?>" method="POST">
    <label>First Name:
        <input type="text" name="firstName" value="<?php echo $data['user']->getFirstName(); ?>">
    </label>
    <br>
    <label>Last Name:
        <input type="text" name="lastName" value="<?php echo $data['user']->getLastName(); ?>">
    </label>
    <br>
    <label>Email:
        <input type="text" name="email" value="<?php echo $data['user']->getEmail(); ?>">
    </label>
    <br>
    <label>Description:
        <input type="text" name="description" value="<?php echo $data['user']->getDescription(); ?>">
    </label>
    <br>
    <label>Phone Number:
        <input type="text" name="phoneNumber" value="<?php echo $data['user']->getPhoneNumber(); ?>">
    </label>
    <input name="submit" type="submit" value="Update">
</form>
<?php
    include_once "Views/General/footer.php";
?>
</body>
</html>














