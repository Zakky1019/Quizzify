<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="png" href="http://localhost/Quizzify/Quizzify/images/icon2.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactUs</title>

    <link rel="stylesheet" href="../Interface/css_files/navFoot.css">
    <script type="text/javascript" src="Home.js"></script>


    <style>
        /*Contact Us Section*/
        .csec {
            background: linear-gradient(to right, #4AA017, #b3f58d);
            background-attachment: fixed;
            position: absolute;
            width: 100%;
            height: 250px;
            top: 200px;
            content: '';
            transform-origin: top right;
            transform: skewY(-10deg);
            z-index: -1;
        }

        .back-contact {
            display: flex;
            justify-content: space-around;

            flex-wrap: wrap;
        }

        .cc {
            height: auto;
            width: 90%;
            border-radius: 10px;
            justify-content: center;
            box-shadow: 1px 1px 20px rgba(0, 0, 0, 0.4);
            background: #fff;

            max-width: 400px;
            margin: 20px;
            padding: 20px;

        }

        .cc form {
            
            margin-top: 20px;
            
        }

        .cc form label {
            
            color: #2E3D49;
            font-size: 14px;
            font-family: sans-serif;
        }

        .cc form input,
        form textarea {
            
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            box-shadow: inset 0 0 5px lightgray;
            outline: none;
        }

        .imp {
            color: red;
        }

       

        #csubmit {
            
            background: linear-gradient(to right, #4AA017, #b3f58d);
            border: none;
            outline: none;
            width: 100%;
            padding: 15px;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        

        /* Add media query for smaller screens */
        @media (max-width: 768px) {
            .back-contact {
                flex-direction: column;
                align-items: center;
            }

            .cc {
                width: 90%;
                max-width: 400px;
                height: auto;
                margin-top: 20px;
            }

            .cc form {
                margin-top: 20px;
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
                <li><a href="../Interface/Home.php#about_section">About us</a></li>
                <li><a href="../Interface/contactus.php">Contact Us</a></li>
                <li><a href="../Interface/team.php">Team</a></li>

            </ul>
        </div>
    </header>
    <!-- nav end -->

    <!-- CONTACT US -->
    <div class="diffSection" id="contactus_section">
        <center>
            <h1 style=" padding: 50px; font-family: 'Times New Roman', Times, serif;">CONTACT US</h1>
        </center>
        <div class="csec"></div>
        <div class="back-contact">
            <div class="cc">
                <form action="../Classes/contact.php" method="post" enctype="text/plain">
                    
                    <table>
                        <tr>
                            <td>
                                <label>First Name <span class="imp">*</span></label>
                            </td>
                            <td>
                                <label>Last Name <span class="imp">*</span></label><br>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="text" name="" style="margin-right: 10px; width: 175px" required="required"></td>
                            <td><input type="text" name="lname" style="width: 175px" required="required"></td>
                        </tr>
                    </table>

                    <label>Email <span class="imp">*</span></label><br>
                    <input type="email" name="mail" style="width: 100%" required="required"><br>
                    <label>Message <span class="imp">*</span></label><br>
                    <input type="text" name="message" style="width: 100%" required="required"><br>
                    <label>Additional Details</label><br>
                    <textarea name="addtional"></textarea><br>
                    <button type="submit" id="csubmit" name="submit">Send Message</button>
                </form>
            </div>
        </div>
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
                    <input class="btn" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </footer>

    <!-- footer ends -->

</body>

</html>

<?php
