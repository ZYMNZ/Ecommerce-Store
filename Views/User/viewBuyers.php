<?php
include_once "Views/General/session.php";
?>

<html lang="en">
<head>
    <title>Buyers List</title>
    <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/home.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/account.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="Views/styles/modal.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Views/styles/adminView.css">
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
            <table class="userViewTable">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                <?php
                foreach ($data['users'] as $user)
                {
                    $id = $user->getUserId();
                    echo "<tr>";
                    echo "<input type='hidden' name='userId' id='userId' value='$id'>";
                    echo "<td>" . htmlentities($user->getFirstName(),ENT_QUOTES) . "</td>";
                    echo "<td>" . htmlentities($user->getLastName(),ENT_QUOTES) . "</td>";
                    echo "<td>" . htmlentities($user->getEmail(),ENT_QUOTES) . "</td>";
                    echo "<td><a href='/?controller=user&action=editBuyer&id=$id'><button class='actions'>Edit...</button></a></td>";
                    echo "<td><button class='actions' type='button' data-toggle='modal' data-target='#myModal'>Delete...</button></td></tr>";
                }
                ?>
            </table>
        </main>
    </div>


    <?php
        include_once "Views/General/adminFooter.php"
    ?>

</body>
</html>
