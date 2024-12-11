<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="png" href="http://localhost/Quizzify/Quizzify/images/icon2.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset </title>

    <link rel="stylesheet" href="../Interface/css_files/navFoot.css">
    <script type="text/javascript" src="Home.js"></script>


    <style>
        .form-container {
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
            background-color: white;
            padding: 0px 30px 30px 30px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            margin-bottom: 10%;
            margin-top: 10%;


        }

        .head {
            text-align: center;

            height: 50px;
            padding-top: 15px;
            border-bottom: #4AA017 1px solid;


        }

        .form-group {
            margin-top: auto;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            background-color: #4AA017;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        .form-group button:hover {
            background-color: #45a049;
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
                <li><a href="../Interface/contactus.php">Contact Us</a></li>
                <li><a href="../Interface/team.php">Team</a></li>
            </ul>
            <!-- <div class="srch"><input type="text" class="search" placeholder="Search here..."><img src="../images/icon/search.png" alt="search" onclick=slide()></div> -->
            <a class="get-started" href="Register.php">Get Started</a>
            <img src="./images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
        </nav>

        <div class="side-menu" id="side-menu">
            <div class="close" onclick="sideMenu(1)"><img src="../images/icon/close.png" alt=""></div>

            <ul>
                <li><a href="../Interface/Home.php">Home</a></li>
                <li><a href="../../QuizCreation/quiz.php">Quiz</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="#about_section">About us</a></li>
                <li><a href="../Interface/contactus.php">Contact Us</a></li>
                <li><a href="../Interface/team.php">Team</a></li>

            </ul>
        </div>
    </header>
    <!-- nav end -->




    <div class="form-container">
        <form action="../Classes/chnge.php" method="post">
        <div class="head" style="position: relative;">
    <h2>TO RESET PASSWORD</h2>
    <a href="../Interface/Register.php" style="position: absolute; top: 0; right: 0;"><br>
        <img src="../images/icon/cross.png" alt="Your Image Description" />
    </a>
</div>


            <br><br>

            <!-- ERROR HANDLING -->

            <center class="error">
                <!-- display error here -->
                <?php
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                    switch ($error) {
                            // registration error handling
                        case 'emptyInput':
                            echo '<span class="error" style="color:red;">Enter your email.</span>';
                            break;

                        case 'emailNotFound':
                            echo '<span class="error" style="color:red;">Email Not Found</span>';
                    }
                } else if (isset($_GET['status'])) {
                    $status = $_GET['status'];
                    switch ($status) {
                        case 'linkSent':
                            echo '<span class="status" style="color:green;">Link has been sent. Check your Email!</span>';
                    }
                }
                ?>
            </center>

            <br><br>
            <div class="form-group">

                <input type="text" id="email" name="email" placeholder="Enter your Email">
            </div>

            <div class="form-group">
                <button type="submit" name="submit">Send Link</button>
            </div>
        </form>
    </div>



    <!-- FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="left-col">
                <img src="../images/QUIZZIFY.png" style="width: 200px;">
                <div class="logo"></div>
                <br>
                <p class="rights-text">Copyright © 2023 Created By UWU TEAM, All Rights Reserved.</p>
                <br>
                <p><img src="../images/icon/location.png"> Passara Road, Badulla</p><br>
                <p><img src="../images/icon/phone.png"> 055-222-4446</p><br>
                <p><img src="../images/icon/mail.png"> Quizzify2023@gmail.com
            </div>
            <div class="right-col">
                <h1 style="color: #fff">Our Newsletter</h1>
                <div class="border"></div><br>
                <p>Enter Your Email to get our News and updates.</p>
                <form class="newsletter-form">
                    <input class="txtb" type="email" placeholder="Enter Your Email">
                    <input class="btn" type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </footer>

    <!-- footer ends -->

</body>

</html>

<?php
