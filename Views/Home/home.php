<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/home.css"
    </head>

    <body>
        <?php
            include_once "Views/General/navbar.php";
        ?>
        <div class="wrapper">
            <section id="heroSection">
                <section class="headerParagraphSection">
                    <label class="landingPageSlogan">Header</label>
                    <div class="landingIntro">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                </section>
                <img class="LandingImage" src="Views/images/landingImage.png">
            </section>
            <section class="displayFreelanceInfo">
                <div class="infoDivBox">
                    <label>Over 200K Students</label>
                </div>

                <div class="infoDivBox">
                    <label>20+ Courses</label>
                </div>

                <div class="infoDivBox">
                    <label>100+ Followers</label>
                </div>
            </section>

            <div class="imagesParent">
                <div class="imagesSlider">
                    <img src="Views/images/Game-Development-Company.jpg">
                    <img src="Views/images/GraphicDesigning.jpg">
                    <img src="Views/images/istockphoto.jpg">
                    <img src="Views/images/logodesignservices.png">
                    <img src="Views/images/MarketingServices.jpg">
                    <img src="Views/images/programming.jpeg">
                    <img src="Views/images/videoeditor.jpg">
                </div>
                <div class="imagesSlider">
                    <img src="Views/images/Game-Development-Company.jpg">
                    <img src="Views/images/GraphicDesigning.jpg">
                    <img src="Views/images/istockphoto.jpg">
                    <img src="Views/images/logodesignservices.png">
                    <img src="Views/images/MarketingServices.jpg">
                    <img src="Views/images/programming.jpeg">
                    <img src="Views/images/videoeditor.jpg">
                </div>
            </div>

            <?php
            include_once "Views/General/footer.php";
            ?>
        </div>
    </body>
</html>