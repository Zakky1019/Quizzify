<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="png" href="http://localhost/New/images/icon2.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Comaptible" content="IE=edge">
    <title>Quizzify</title>
    <meta name="desciption" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Home.css">
    <script type="text/javascript" src="Home.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script>
        $(window).on('scroll', function() {
            if ($(window).scrollTop()) {
                $('nav').addClass('black');
            } else {
                $('nav').removeClass('black');
            }
        })
    </script>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: white;
            margin-top: -40%;
        }

        .text-section {
            flex: 1;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .button-container {
            display: flex;
            gap: 50px;
            justify-content: center;

        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4AA017;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: white;
            color: #4AA017;
            border: 1px solid #4AA017;
        }

        .image-section {
            flex: 1;
            padding: 20px;
            text-align: center;

        }

        .image2 {
            max-width: 100%;
            height: auto;
        }


        input {
            margin: 10px;
            height: 40px;
            width: 50px;
            border: none;
            border-radius: 10px;
            text-align: center;
            font-family: arimo;
            font-size: 1.2rem;
            background: #d4ece2;

        }

        /* Styles for the pop-up container */
        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        /* Styles for the pop-up box */
        .popup-box {
            background: white;
            max-width: 400px;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        /* Styles for the close button */
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <header id="header">
        <nav>
            <div class="logo"><img src="http://localhost/Quizzify/Quizzify/images/QUIZZIFY.png" alt="logo"></div>
            <ul>
            <li><a href="../../QuizCreationapi/index.php">Quiz</a></li>
				<li><a href="http://localhost/Quizzify/Quizzify/Interface/php_files/blog.php">Blog</a></li>
				<li><a href="#about_section">About us</a></li>
				<!-- <li><a href="#team_section">Team</a></li> -->
            </ul>
            <div class="srch"><input type="text" class="search2" placeholder="Search here..." style="height: 10px; width:90px; border: none; background: transparent;"><img src="http://localhost/Quizzify/Quizzify/images/icon/search.png" alt="search" onclick=slide()></div>

            <?php

            if (isset($_SESSION["id"])) {
            ?>
                <!-- <a class="get-started" href="http://localhost/New/Includes/logout.inc.php">Logout</a> -->
               <a class="get-started" href="http://localhost/Quizzify/Quizzify/Interface/php_files/user_profile.php">Profile</a>

            <?php
            } else {

            ?>
                <a class="get-started" href="http://localhost/Quizzify/Quizzify/Interface/php_files/registration.php">Get Started</a>
            <?php
            }
            ?>


            <img src="http://localhost/Quizzify/Quizzify/images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
            <div class="side-menu" id="side-menu">
                <div class="close" onclick="sideMenu(1)"><img src="http://localhost/Quizzify/Quizzify/images/icon/close.png" alt=""></div>
                <!-- <div class="user">
				<img src="images/creator/Sanoj.jpg" alt="Username">
				<p>Sanoj Ahamed</p> -->
                <!-- </div> -->
                <ul>
                    <li><a href="#about_section">About</a></li>
                    <li><a href="#portfolio_section">Portfolio</a></li>
                    <li><a href="#team_section">Team</a></li>
                    <li><a href="#services_section">Services</a></li>
                    <li><a href="#contactus_section">Contact</a></li>
                    <li><a href="#feedBACK">Feedback</a></li>
                </ul>
            </div>

    </header>

    <div class="container">
        <div class="text-section">

            <h1>Welcome
                <?php

                if (isset($_SESSION["id"])) {
                ?>
                    <?php echo $_SESSION["username"]; ?>

                <?php
                } else {

                ?>
                    User!
                <?php
                }
                ?>
            </h1>
            <p>
            <h3>Are you ready to start your fun ride with QUIZZIFY ? </h3><br>
            <h4> Choose your option, and let's go!</h4>
            </p>
            <div class="button-container">

                <button onclick="openPopup()">Play Now</button>
                <button onclick="redirect()">Create Quiz</button>

            </div>

        </div>
        <div class="image-section">
            <img src="http://localhost/Quizzify/Quizzify/images/gif.gif" alt="Image" class="image2">
        </div>
    </div>
    <!-- Pop-up container -->
    <div class="popup-container" id="popupContainer">
        <!-- Pop-up box -->
        <div class="popup-box">
            <!-- <span class="close-button" onclick="closePopup()">&times;</span> -->
            <h2>Enter the Passcode</h2>
            <div class="userInput" style="display: flex; justify-content: center;">
                <input type="text" id='1st' maxlength="1" onkeyup="clickEvent(this,'sec')">
                <input type="text" id="sec" maxlength="1" onkeyup="clickEvent(this,'third')">
                <input type="text" id="third" maxlength="1" onkeyup="clickEvent(this,'fourth')">

                <input type="text" id="fourth" maxlength="1">
            </div><br><br><br>

            <a class="get-started" href="http://localhost/Quizzify/Quizzify/QuizCreation/quiz.php">Verify</a>
        </div>
    </div>

    </div>

    </div>

    </div>


    <!-- FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="left-col">
                <img src="http://localhost/Quizzify/Quizzify/images/QUIZZIFY.png" style="width: 200px;">
                <div class="logo"></div>

                <p class="rights-text">Copyright © 2023 Created By UWU TEAM, All Rights Reserved.</p>
                <br>
                <p><img src="http://localhost/Quizzify/Quizzify/images/icon/location.png"> Passara Road, Badulla</p><br>
                <p><img src="http://localhost/Quizzify/Quizzify/images/icon/phone.png"> 055-222-4446<br><img src="http://localhost/Quizzify/Quizzify/images/icon/mail.png">&nbsp; </p>
            </div>
            <div class="right-col">
                <h1 style="color: #fff">Our Newsletter</h1>
                <div class="border"></div><br>
                <p>Enter Your Email to get our News and updates.</p>
                <form class="newsletter-form">
                    <input class="txtb" type="email" placeholder="Enter Your Email">
                    <input class="btn" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </footer>

    <script>
        // Function to open the pop-up
        function openPopup() {
            document.getElementById('popupContainer').style.display = 'flex';
        }

        // Function to close the pop-up
        function closePopup() {
            document.getElementById('popupContainer').style.display = 'none';
        }

        function redirect() {
            window.location.href = 'http://localhost/Quizzify/Quizzify/public_html/index.php';
        }
    </script>

</body>

</html>