<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
    </head>
    <body>
        <?php
            include_once "Views/General/navbar.php";
        ?>
        <section>
            <header class="header">
                <label class="headerFont">Welcome</label>
            </header>
            <section>
                <label>Email:</label> <br/>
                <input type="text" name="email" class="inputField"> <br/>
                <label>Password:</label> <br/>
                <input type="password" name="password" class="inputField"> <br/>
            </section>
        </section>
        <footer></footer>
    </body>
</html>