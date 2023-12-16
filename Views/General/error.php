<?php
include_once 'Views/General/session.php';
?>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/home.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/account.css">
    <link rel="stylesheet" type="text/css" href="Views/styles/error.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
<?php
include_once "Views/General/navbar.php";
?>
<div class="mainContentWrapper">
    <main>
        <section class="errorSection displayFlex height100Percent">
            <header class="textAlignCenter">
                <label class="errorHeader">
                    404
                </label>
            </header>
            <div class="textAlignCenter">
                <label class="pageNotFound">
                    Page not found
                </label>
            </div>
        </section>
    </main>
</div>

<?php
include_once "Views/General/footer.php";
?>
</body>