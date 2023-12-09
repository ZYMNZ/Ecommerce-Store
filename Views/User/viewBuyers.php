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
                    <th>Description</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
                <?php
                foreach ($data['users'] as $user)
                {
//        if ($user->getDescription() === 'NULL')  $user->setDescription('None');
//        if ($user->getPhoneNumber() === 'NULL')  $user->setPhoneNumber('None');
                    $id = $user->getUserId();
                    echo "<tr>";
                    echo "<input type='hidden' name='userId' id='userId' value='$id'>";
                    echo "<td>" . $user->getFirstName() . "</td>";
                    echo "<td>" . $user->getLastName() . "</td>";
                    echo "<td>" . $user->getEmail() . "</td>";
                    echo "<td><button><a href='/?controller=user&action=editBuyer&id=$id'>Edit...</a></button></td>";
                    echo "<td><button type='button' data-toggle='modal' data-target='#myModal'>Delete...</button></td></tr>";
                }
                ?>
            </table>

            <!--<script>-->
            <!--    // Use the PHP value directly in the JavaScript code-->
            <!--    document.querySelector('button[data-toggle="modal"]').addEventListener('click', () => {-->
            <!--        var currentId = this.closest('tr').querySelector('#userId').value;-->
            <!--        console.log(currentId);-->
            <!--    });-->
            <!---->
            <!--</script>-->
            <?php
            //include_once 'Views/General/modal.php';
            //modal('deleteBuyer', $id);
            //include_once "Views/General/footer.php";
            //?>
        </main>
    </div>


    <?php
        include_once "Views/General/adminFooter.php"
    ?>

</body>
</html>
