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
    <link rel="stylesheet" type="text/css" href="Views/styles/home.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/account.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/adminView.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="mainContentWrapper">
        <main>
            <?php
            include_once "Views/General/navbar.php";
            ?>

            <h1>Admin</h1>
            <br>
            <br>
            <form action='<?php echo "/?controller=user&action=updateBuyer&id=" . $_GET['id'] ?>' method="post">
                <label>First Name:
                    <input type="text" name='firstName' value='<?php echo $data['user']->getFirstName(); ?>'>
                </label>
                <br>
                <label>Last Name:
                    <input type="text" name='lastName' value='<?php echo $data['user']->getLastName(); ?>'>
                </label>
                <br>
                <label>Email:
                    <input type="text" name='email' value='<?php echo $data['user']->getEmail(); ?>'>
                </label>
                <input type="submit" name="submit" value="Update">
            </form>
        </main>
    </div>

    <?php
        include_once "Views/General/footer.php";
    ?>
</body>
</html>