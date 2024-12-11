<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="png" href="http://localhost/New/images/icon2.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Comaptible" content="IE=edge">
    <title>Choose Role</title>
    <meta name="desciption" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Interface/css_files/choose.css">
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
            /* padding: 20px; */
            background-color: white;
            margin-top: -100%;

        }

        .text-section {
            flex: 1;
            padding: 20px;
            text-align: center;
            /* border: solid 1px; */
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
            /* padding: 20px; */
            text-align: center;
            /* border: solid 1px; */
            width: 505px;
            height: 10%;

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

        .profile {
            margin-left: 50px;
            padding: 5px 20px;
            border: 2px solid #4AA017;
            border-radius: 30px;
            text-decoration: none;
            width: 170px;
            height: 40px;
            padding-top: 10px;
            transition: .5s;
            background-color: #4AA017;
            color: #fff;
            text-align: center;
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

        /* Styles for small screens */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Navigation Bar styles for small screens */
        nav ul {
            display: none;
        }

        nav .menu {
            display: block;
        }

        /* Container styles for small screens */
        .container {
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .text-section,
        .image-section {
            padding: 20px;
            text-align: center;
        }

        /* Pop-up box styles for small screens */
        .popup-box {
            max-width: 100%;
            padding: 10px;
        }



        /* Styles for larger screens */
        @media screen and (min-width: 768px) {

            /* Navigation Bar styles for larger screens */
            nav ul {
                display: flex;
            }

            nav .menu {
                display: none;
            }

            /* Container styles for larger screens */
            .container {
                flex-direction: row;
                margin-top: -40%;
            }

            .text-section {
                flex: 1;
            }

            .image-section {
                flex: 1;
            }


        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <header id="header">
        <nav>
            <div class="logo"><img src="../images/QUIZZIFY.png" alt="logo"></div>
            <ul>
                <li><a href="../Interface/Home.php">Home</a></li>
                <li><a href="../../QuizCreationapi/index.php">Quiz</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="#about_section">About us</a></li>
                <!-- <li><a href="../Interface/contactus.php">Contact Us</a></li> -->
                <li><a href="../Interface/team.php">Team</a></li>
                <?php
                if (isset($_SESSION["id"])) {
                    if ($_SESSION["user_type"] === "dual") {

                ?>
                        <li><a href="../Interface/chooseRole.php">Create/Play</a></li>
                    <?php
                    } elseif ($_SESSION["user_type"] === "participant") {

                    ?>
                        <li><a href="../Interface/chooseRole.php">Create/Play</a></li>
                    <?php
                    } elseif ($_SESSION["user_type"] === "instructor") {

                    ?>
                        <li><a href="../Interface/chooseRole.php">Create/Play</a></li>
                <?php
                    }
                }

                ?>

            </ul>
            <!-- <div class="srch"><input type="text" class="search2" placeholder="Search here..." style="height: 10px; width:90px; border: none; background: transparent;"><img src="http://localhost/Quizzify/Quizzify/images/icon/search.png" alt="search" onclick=slide()></div> -->

            <?php
            if (isset($_SESSION["id"])) {
                if ($_SESSION["user_type"] === "dual") {

            ?>
                    <li><a class="get-started" href="../Profile/user_profile.php" style="text-align: center;"><?php echo $_SESSION["username"]; ?></a></li>
                <?php
                } elseif ($_SESSION["user_type"] === "participant") {

                ?>
                    <li><a class="get-started" href="../participantprofile/participantprofile.php" style="text-align: center;"><?php echo $_SESSION["username"]; ?></a></li>
                <?php
                } elseif ($_SESSION["user_type"] === "instructor") {

                ?>
                    <li><a class="get-started" href="../intructor/iuser_profile.php" style="text-align: center;"><?php echo $_SESSION["username"]; ?></a></li>
                <?php
                }
            } else {

                ?>
                <a class="get-started" href="../Interface/Register.php" style="text-align: center;">Get Started</a>
            <?php
            }
            ?>


            <img src="../images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
            <div class="side-menu" id="side-menu">
                <div class="close" onclick="sideMenu(1)"><img src="../images/icon/close.png" alt=""></div>

                <ul>
                    <?php
                    if (isset($_SESSION["id"])) {
                        if ($_SESSION["user_type"] === "dual") {

                    ?>
                            <li><a class="get-started" href="../Profile/user_profile.php" style="text-align: center;"><?php echo $_SESSION["username"]; ?></a></li>
                        <?php
                        } elseif ($_SESSION["user_type"] === "participant") {

                        ?>
                            <li><a class="get-started" href="../participantprofile/participantprofile.php" style="text-align: center;"><?php echo $_SESSION["username"]; ?></a></li>
                        <?php
                        } elseif ($_SESSION["user_type"] === "instructor") {

                        ?>
                            <li><a class="get-started" href="../intructor/iuser_profile.php" style="text-align: center;"><?php echo $_SESSION["username"]; ?></a></li>
                    <?php
                        }
                    }

                    ?>

                    <li><a href="../Interface/Home.php">Home</a></li>
                    <li><a href="../../QuizCreation/quiz.php">Quiz</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="#about_section">About us</a></li>
                    <li><a href="../Interface/contactus.php">Contact Us</a></li>
                    <li><a href="../Interface/team.php">Team</a></li>

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


            </h1>
            <p>
            <h3>Are you ready to start your fun ride with QUIZZIFY ? </h3><br>
            <h4> Choose your option, and let's go!</h4>
            </p>
        <?php
                } else {

        ?>
            User!
            <p>
            <h2>How much do you know about IT? <br> How much fun can you have while learning? <br>Here is the way to find out: <br><br>
                <h1 style="color: #4AA017;">JOIN QUIZZIFY</h1><br>
                <div>
            </h2>
        </div><br>

        </p>
    <?php
                }
    ?>
    <div class="button-container">

        <?php
        if (isset($_SESSION["id"])) {
            if ($_SESSION["user_type"] === "dual") {

        ?>
                <button onclick="openPopup()">Play Now</button>
                <button onclick="redirect()">Create Quiz</button>
            <?php
            } elseif ($_SESSION["user_type"] === "participant") {

            ?>
                <button onclick="openPopup()">Play Now <a href="../Quizzify02/quizpin.php"</button>
            <?php
            } elseif ($_SESSION["user_type"] === "instructor") {

            ?>
                <button onclick="redirect()">Create Quiz</button>
        <?php
            }
        }
        ?>


    </div>

    </div>
    <div class="image-section">
        <img src="http://localhost/Quizzify/Quizzify/images/gif.gif" alt="Image" class="image2">
    </div>
    </div>
   
    <!--  -->

    </div>

    </div>

    </div>


    <!-- FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="left-col">
                

                <p class="rights-text">Copyright © 2023 Created By UWU TEAM, All Rights Reserved.</p>
                <br>
                <p><img src="../images/icon/location.png"> Passara Road, Badulla</p><br>
                <p><img src="../images/icon/phone.png"> 055-222-4446<br>
                <p><img src="../images/icon/mail.png"> Quizzify2023@gmail.com
            </div>
            <div class="right-col">
            <img src="../images/QUIZZIFY.png" style="width: 200px;">
                <div class="logo"></div>
            </div>
        </div>
    </footer>

    <!-- <script>
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
    </script> -->

</body>

</html>