<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="png" href="http://localhost/Quizzify/Quizzify/images/icon2.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUpNew</title>

    <link rel="stylesheet" href="../Interface/css_files/navFoot.css">
    <script type="text/javascript" src="Home.js"></script>


    <style>
        .bdy {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-image: url('http://localhost/Quizzify/Quizzify/images/img8.jpg');
            margin: 0;
            padding: 0;
        }

        .main {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            margin: 0;

        }


        .form-box {
            max-width: 80%;
            width: 30%;
            background: rgba(255, 255, 255, 0.575);
            padding: 20px;
            box-shadow: 0px 0px 100px rgba(0, 0, 0, 0.4);
        }

        .button-box {
            width: 220px;
            margin: 35px auto;
            position: relative;
            box-shadow: 0 0 20px 9px rgb(146, 223, 127);
            border-radius: 30px;
            height: 35px;


        }

        .toggle-btn {
            padding: 10px 30px;
            cursor: pointer;
            background: transparent;
            border: 0;
            outline: none;
            position: relative;
            font-family: sans-serif;
            font-size: 14px;
        }

        #btn {
            top: 0;
            left: 0;
            position: absolute;
            width: 110px;
            height: 100%;
            background: linear-gradient(to right, #4AA017, #b3f58d);
            border-radius: 30px;
            transition: 0.5ss;
        }


        .input-group1,
        .input-group2 {
            margin-top: 20px;
            text-align: center;
        }



        .input-field {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: none;
            background: transparent;
            font-family: sans-serif;
            border-bottom: 1px gray solid;
        }

        select {
            width: 171px;

        }

        .op {
            color: black;
        }

        table {
            align-content: center;
            width: 100%;
        }

        td {
            padding-left: 25px;
            padding: 10px;
            text-align: center;
        }

        .submit-btn1,
        .submit-btn2 {
            width: 100%;
            padding: 10px;
            cursor: pointer;
            background: linear-gradient(to right, #4AA017, #b3f58d);
            border: 0;
            outline: none;
            border-radius: 30px;
            font-family: sans-serif;
            font-size: 16px;

            margin-top: 20px auto;
            display: block;
        }

        .check-box {
            margin: 30px 10px 30px 0;

        }

        span {
            color: #777;
            font-size: 14px;
            font-family: sans-serif;
            text-align: center;
        }

        .reset {
            font-family: sans-serif;
            text-align: center;

        }

        #Login {
            left: 50px;
        }

        #Register {
            left: 650px;
        }

        label {
            font-size: 14px;
            font-family: sans-serif;
        }



        /* Media query for smaller screens */
        @media (max-width: 768px) {
            .main {
                height: auto;
                /* Let the height adjust based on content for smaller screens */
            }


        }

        /* Media query for smaller screens */
        @media (max-width: 768px) {
            .form-box {
                width: 90%;
                /* Adjust the width for smaller screens */
            }
        }

        @media (max-width: 768px) {
            .form-box {
                width: 90%;
                /* Adjust the width for smaller screens */
            }

            .input-group1,
            .input-group2 {
                width: 90%;
                /* Adjust the width of input groups for smaller screens */
                max-width: none;
                /* Remove the maximum width for smaller screens */
            }
        }
    </style>

</head>



<body onload="getcookiedata()" class="bdy">
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
                <?php
                    if (isset($_SESSION["id"])) {
                        if ($_SESSION["user_type"] === "dual") {

                    ?>
                            <li><a href="../Interface/chooseRole.php">Create/Play</a></li>
                        <?php
                        } elseif ($_SESSION["user_type"] === "participant") {

                        ?>
                            <li><a href="../Interface/chooseRole.php">Play</a></li>
                        <?php
                        } elseif ($_SESSION["user_type"] === "instructor") {

                        ?>
                            <li><a href="../Interface/chooseRole.php">Create</a></li>
                    <?php
                        }
                    }

                    ?>
            </ul>
            <!-- <div class="srch"><input type="text" class="search" placeholder="Search here..."><img src="../images/icon/search.png" alt="search" onclick=slide()></div> -->
            <?php
            if (isset($_SESSION["id"])) {
                if ($_SESSION["user_type"] === "dual") {

            ?>
                    <a href="../Profile/user_profile.php" class="profile"><?php echo $_SESSION["username"]; ?></a>
                <?php
                } elseif ($_SESSION["user_type"] === "participant") {

                ?>
                    <a href="../Includes/logout.inc.php" class="profile"><?php echo $_SESSION["username"]; ?></a>
                <?php
                } elseif ($_SESSION["user_type"] === "instructor") {

                ?>
                    <a href="../Includes/logout.inc.php" class="profile"><?php echo $_SESSION["username"]; ?></a>
                <?php
                }
            } else {

                ?>
                <a class="get-started" href="../Interface/Register.php">Get Started</a>
            <?php
            }
            ?>
			<img src="../images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
		</nav>

        <div class="side-menu" id="side-menu">
            <div class="close" onclick="sideMenu(1)"><img src="../images/icon/close.png" alt=""></div>

            <ul>
            <?php
                    if (isset($_SESSION["id"])) {
                        if ($_SESSION["user_type"] === "dual") {

							?>
							<a href="../Profile/user_profile.php" class="profile"><?php echo $_SESSION["username"]; ?></a>
						<?php
						} elseif ($_SESSION["user_type"] === "participant") {
		
						?>
							<a href="../Includes/logout.inc.php" class="profile"><?php echo $_SESSION["username"]; ?></a>
						<?php
						} elseif ($_SESSION["user_type"] === "instructor") {
		
						?>
							<a href="../Includes/logout.inc.php" class="profile"><?php echo $_SESSION["username"]; ?></a>
						<?php
						}
                    }

                    ?>
                <li><a href="../Interface/Home.php">Home</a></li>
                <li><a href="../../QuizCreation/quiz.php">Quiz</a></li>
                <li><a href="blog.php">Blog</a></li>
                <!-- <li><a href="#about_section">About us</a></li> -->
                <!-- <li><a href="../Interface/contactus.php">Contact Us</a></li> -->
                <li><a href="../Interface/team.php">Team</a></li>

            </ul>
        </div>
    </header>
    <!-- nav end -->

    <div class="main">

        <div class="form-box">

            <div class="right">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="Login()">LogIn</button>
                    <button type="button" class="toggle-btn" onclick="Register()">Register</button>

                </div>

                <center class="error">
                    <!-- display error here -->
                    <?php
                    if (isset($_GET['error'])) {
                    ?>
                        <style>
                            .error {

                                height: auto;
                                font-weight: bold;
                                color: red;
                                font-size: 17px;


                            }
                        </style>



                        <?php
                        $error = $_GET['error'];
                        switch ($error) {
                                // registration error handling
                            case 'emptyInput':
                                echo '<span class="error">All fields are required.</span>';
                                break;
                            case 'invalidUser':
                                echo '<span class="error">Invalid username.<br>Include A-Z a-z 0-9 and 5 characters</span>';
                                break;
                            case 'invalidEmail':
                                echo '<span class="error">Invalid email address.Include "@"</span>';
                                break;
                            case 'passwordDonotMatch':
                                echo '<span class="error">Passwords do not match.</span>';
                                break;
                            case 'incorrectPwd':
                                echo '<span class="error">Password should have Uppercase, Lowercase, Numbers and 8 characters.</span>';
                                break;
                                case 'NoOptionSelected':
                                    echo '<span class="error">Select atleast 1 option to continue</span>';
                                    break;
                                

                            case 'userExists':
                                echo '<span class="error">User already exists.</span>';
                                break;
                            case 'emailExists':
                                echo '<span class="error">Email already exists.</span>';
                                break;
                            case 'emptyCheckBox':
                                echo '<span class="error" >Please choose your option/s to proceed.</span>';
                                break;

                                // login error handling
                            case 'userNotFound':
                                echo '<span class="error">User not found!</span>';
                                break;
                            case 'invalidLogin':
                                echo '<span class="error">Invalid Login!</span>';
                                break;

                            case 'NotVerified':
                                echo '<span class="error">Not Verified. Please verify your account.</span>';
                                break;
                        }
                    } else if (isset($_GET['status'])) {
                        ?>
                        <style>
                            .status {

                                height: auto;
                                font-weight: bold;
                                color: green;
                                font-size: 17px;

                            }
                        </style>

                    <?php

                        $status = $_GET['status'];
                        switch ($status) {

                            case 'emailsent':
                                echo '<span class="status" styly="color:white">Registration Success! please check your Email to verify.</span>';
                                break;
                            case 'verificationsent':
                                echo '<span class="status">Verification sent</span>';
                                break;
                        }
                    }
                    ?>

                </center>

                <!--Login form-->

                <form action="../Includes/login.inc.php" id="Login" class="input-group1" method="POST" name="form1">

                    <br>
                    <div class="form-group">
                        <input type="text" id="user" class="form-control input-field" placeholder="Username" name="username" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>">
                    </div>

                    <div class="form-group">
                        <input type="password" id="pass" class="form-control input-field" placeholder="Password" name="password" value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>">
                    </div>
                    <br><br>
                    <div class="form-check">
                        <input type="checkbox" id="check" name="remember_me" class="form-check-input" <?php echo isset($_COOKIE['token']) ? 'checked' : ''; ?>>
                        <label for="check" class="form-check-label"> Remember me</label><br><br>
                    </div>

                    <span><a href="../Interface/ForgotPwd.php" name="reset" class="reset">Forgot password?</a></span><br>
                    <br><br><span>Not yet registered?&nbsp;&nbsp;<a href="#" onclick="myFunction1()" id="reg1">Register</a></span><br><br><br>
                    <span class="error2" style="color: red;"></span><br>
                    <button type="submit" value="" class="btn btn-primary submit-btn1" name="submit1">LogIn</button>

                </form>

                <!--Register form-->


                <form action="../Includes/signup.inc.php" id="Register" class="input-group2" method="POST" name="form2">

                    <table>
                        <tr>
                            <td><input type="text" class="input-field" placeholder="First Name" name="firstname"></td>
                            <td><input type="text" class="input-field" placeholder="Last Name" name="lastname"></td>
                        </tr>
                        <tr>
                            <td><input type="email" class="input-field" placeholder="Email" name="email"></td>
                            <td><input type="text" class="input-field" placeholder="Username" name="username"></td>
                        </tr>
                        <tr>
                            <td><input type="password" id="" class="input-field" placeholder="Password" name="password"></td>
                            <td><input type="password" id="" class="input-field" placeholder="Confirm Password" name="confirm_password"></td>
                        </tr>

                    </table>


                    <br><label>Choose your option/s</label><br>

                    <br>
                    <div name="checkbox">
                        <input type="checkbox" id="" name="play">&nbsp;&nbsp;<label>Play quiz</label>&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="" name="create">&nbsp;&nbsp;<label>Create quiz</label>
                    </div>
                    <br>
                    <span>Already registered?&nbsp;&nbsp;<a href="" onclick="myFunction2()" id="reg2">Login</a></span><br><br>

                    <!-- <input type="checkbox" class="check-box" id="chkAgree" onclick="goFurther()" /><span>I agree to the Terms & Conditions</span><br> -->

                    <button type="submit" value="" class="submit-btn2" name="submit2" id="btn2">Register</button>

                </form>
            </div>
        </div>
    </div>

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

    <script>
        // button slider

        var x = document.getElementById("Login");
        var y = document.getElementById("Register");
        var z = document.getElementById("btn");
        var n = document.getElementById("reg1");
        var m = document.getElementById("reg2");

        function Register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
            document.getElementById("Register").style.display = "block"; // Add this line to display the registration form
            document.getElementById("Login").style.display = "none";
        }

        function Login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
            document.getElementById("Register").style.display = "none"; // Add this line to hide the registration form
            document.getElementById("Login").style.display = "block";
        }

        function myFunction1() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
            document.getElementById("Register").style.display = "block"; // Add this line to display the registration form
            document.getElementById("Login").style.display = "none";
        }

        function myFunction2() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
            document.getElementById("Register").style.display = "none"; // Add this line to hide the registration form
            document.getElementById("Login").style.display = "block";
        }

        // Add this code at the end of your JavaScript section
        document.addEventListener("DOMContentLoaded", function() {
            // Display only the login form initially
            document.getElementById("Register").style.display = "none";

            // Function to switch to login form when "Login" button is clicked
            function Login() {
                document.getElementById("Register").style.display = "none";
                document.getElementById("Login").style.display = "block";
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0px";
            }

            // Function to switch to registration form when "Register" button is clicked
            function Register() {
                document.getElementById("Login").style.display = "none";
                document.getElementById("Register").style.display = "block";
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px";
            }

            // Attach event listeners to the toggle buttons
            document.querySelector(".toggle-btn:nth-child(1)").addEventListener("click", Login);
            document.querySelector(".toggle-btn:nth-child(2)").addEventListener("click", Register);
        });


        // CheckBox Function
        function goFurther() {
            if (document.getElementById("chkAgree").checked == true) {
                document.getElementById('btn2').style = 'background: linear-gradient(to right, #4AA017, #b3f58d);';
            } else if (document.getElementById("chkAgree").checked == false) {
                document.getElementById('btn2').style = 'background: lightgray;';
            } else {
                document.getElementById('btn2').style = 'background: lightgray;';
            }
        }

        // remember me function

        function setcookie() {
            var u = document.getElementById('user').value;
            var p = document.getElementById('pass').value;

            document.cookie = "myusername" + ";path=/";
            document.cookie = "mypass" + ";path=/";

        }

        function getCookie(name) {
            var cookieValue = null;
            if (document.cookie && document.cookie !== '') {
                var cookies = document.cookie.split(';');
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = cookies[i].trim();
                    if (cookie.substring(0, name.length + 1) === (name + '=')) {
                        cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                        break;
                    }
                }
            }
            return cookieValue;
        }

        // On page load, populate the username and password fields from cookies
        function getcookiedata() {
            var user = getCookie('myusername');
            var pwd = getCookie('mypass');

            if (user !== null && pwd !== null) {
                document.getElementById('user').value = user;
                document.getElementById('pass').value = pwd;
            }
        }
    </script>

</body>

</html>

<?php
