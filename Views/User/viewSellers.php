<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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

    <title>Sellers List</title>

    <?php
    include_once "Views/General/navbar.php";
    ?>
</head>
    <body>
    <div class="mainContentWrapper">
        <main>
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

                <?php foreach ($data['users'] as $user) :
                    $id = $user->getUserId();
                    ?>
                    <tr>
                        <input type='hidden' name='userId' id='userId' value='<?php $id ?>'>
                        <td> <?php echo htmlentities($user->getFirstName(),ENT_QUOTES) ?> </td>
                        <td> <?php echo htmlentities($user->getLastName(),ENT_QUOTES) ?> </td>
                        <td> <?php echo htmlentities($user->getEmail(),ENT_QUOTES) ?> </td>
                        <td> <?php echo htmlentities($user->getDescription(),ENT_QUOTES) ?> </td>
                        <td> <?php echo htmlentities($user->getPhoneNumber(),ENT_QUOTES) ?> </td>
                        <td><a class="actions" href="/?controller=user&action=editSeller&id=<?php echo $id ?>"><button>Edit...</button></a></td>
                        <td><button class="actions" type='button' data-toggle='modal' data-target='#myModal'>Delete...</button></td>
                    </tr>

                <?php  endforeach;  ?>

            </table>
        </main>
    </div>

    <?php
        include_once "Views/General/adminFooter.php"
    ?>
    </body>
</html>

