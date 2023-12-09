<?php
include_once 'Views/General/session.php';
?>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="Views/styles/generalstyles.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/navbar.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/login.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/footer.css">
        <link rel="stylesheet" type="text/css" href="Views/styles/home.css"
        <link rel="stylesheet" type="text/css" href="Views/styles/account.css"
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </head>

    <body>
        <div class="mainContentWrapper">
            <main>
                <?php
                include_once "Views/General/navbar.php";
                ?>
                <div class="wrapper">
                    <section id="heroSection">
                        <section class="headerParagraphSection">
                            <label class="landingPageSlogan">Crafting solutions, One task at a time</label>
                            <div class="landingIntro">
                                <p>
                                    Your Project Desires Meet Expertise! Are you in search of top-tier expertise to bring your vision to life? Look no further. Our platform simplifies the process of finding the perfect expert for your project. Explore a vast pool of skilled professionals, read reviews, and make informed choices. Your project, your way, with the right expertise. Get started today, and experience a world of quality and convenience like never before!
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
                </div>
            </main>
        </div>

        <?php
        include_once "Views/General/footer.php";
        ?>
    </body>
</html>