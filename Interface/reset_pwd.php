<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="png" href="http://localhost/Quizzify/Quizzify/images/icon2.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

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

        .form-group input {
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
                <!-- <li><a href="#about_section">About us</a></li> -->
                <!-- <li><a href="../Interface/contactus.php">Contact Us</a></li> -->
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
        <h2>RESET PASSWORD</h2>
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
                            echo '<span class="error" style="color:red; font-size:15px;">Enter the email</span>';
                            break;

                        case 'emailNotFound':
                            echo '<span class="error" style="color:red; font-size:15px;">Email Not Found. Try Again!</span>';
                            break;


                        case 'EmptyField':
                            echo '<span class="error" style="color:red; font-size:15px;">All fields are required</span>';
                            break;

                        case 'tokenNotAvailable':
                            echo '<span class="error" style="color:red; font-size:15px;">Token Not Available</span>';
                            break;

                        case 'TokenExpired':
                            echo '<span class="error" style="color:red; font-size:15px;">Session Expired! Resubmit Your email to get the Link <br> <br><a href="../Interface/ForgotPwd.php">Resend Link</a></span>';
                            break;
                        case 'invalidToken':
                            echo '<span class="error" style="color:red; font-size:15px;">Invalid token</span>';
                            break;

                        case 'passwordsDoNotMatch':
                            echo '<span class="error" style="color:red; font-size:15px;">Passwords do not match! Try Again.</span>';
                            break;

                        case 'incorrectPassword':
                            echo '<span class="error" style="color:red; font-size:15px;">Password should have <br>Uppercase, Lowercase, Numbers and 8 characters.</span>';
                            break;

                        case 'somethingWentWrong':
                            echo '<span class="error" style="color:red; font-size:15px;">Oops! Something went wrong. Try Again.</span>';
                            break;
                    }
                } else if (isset($_GET['status'])) {
                    $status = $_GET['status'];
                    switch ($status) {
                        case 'PasswordUpdated':
                            echo '<span class="status" style="color:green; font-size:15px;">Password Successfully Updated!</span>';
                    }
                }
                ?>

            </center>

            <br>
            <div class="form-group">
                <input type="hidden" name="token" value="<?php echo isset($_GET['token']) ? htmlspecialchars($_GET['token']) : (isset($_SESSION['reset_token']) ? $_SESSION['reset_token'] : ''); ?>">
            </div>
            <div class="form-group">
                <input type="text" name="email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : (isset($_SESSION['reset_email']) ? $_SESSION['reset_email'] : ''); ?>">
            </div>
            <div class="form-group">
                <input type="password" id="newPassword" name="newPassword" placeholder="Enter new Password">
            </div>

            <div class="form-group">
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm new Password">
            </div>


            <div class="form-group">
                <button type="submit" name="update">Update Password</button>
            </div>
        </form>
    </div>


    <!-- FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="left-col">
                
                <br>
                <p class="rights-text">Copyright © 2023 Created By UWU TEAM, All Rights Reserved.</p>
                <br>
                <p><img src="../images/icon/location.png"> Passara Road, Badulla</p><br>
                <p><img src="../images/icon/phone.png"> 055-222-4446</p><br>
                <p><img src="../images/icon/mail.png"> Quizzify2023@gmail.com
            </div>
            <div class="right-col">
            <img src="../images/QUIZZIFY.png" style="width: 200px;">
                <div class="logo"></div>
            </div>
        </div>
    </footer>

    <!-- footer ends -->

</body>

</html>

<?php
