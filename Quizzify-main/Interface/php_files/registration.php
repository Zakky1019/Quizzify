<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="png" href="http://localhost/Quizzify/Quizzify/images/icon2.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>

    <link rel="stylesheet" href="../css_files/SignUP.css">

</head>

<body onload="getcookiedata()">


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
                        $error = $_GET['error'];
                        switch ($error) {
                                // registration error handling
                            case 'emptyInput':
                                echo '<span class="error" style="color:red;">All fields are required.</span>';
                                break;
                            case 'invalidUser':
                                echo '<span class="error" style="color:red";>Invalid username.<br>Include A-Z a-z 0-9 and 5 characters</span>';
                                break;
                            case 'invalidEmail':
                                echo '<span class="error" style="color:red">Invalid email address.<br>Include "@"</span>';
                                break;
                            case 'passwordDonotMatch':
                                echo '<span class="error" style="color:red">Passwords do not match.</span>';
                                break;
                            case 'incorrectPwd':
                                echo '<span class="error" style="color:red">Password should have <br>Uppercase, Lowercase, Numbers and 8 characters.</span>';
                                break;
                            case 'emailExists':
                                echo '<span class="error" style="color:red">Email already exists.</span>';
                                break;
                            case 'userExists':
                                echo '<span class="error" style="color:red">User already exists.</span>';
                                break;

                                // login error handling
                            case 'userNotFound':
                                echo '<span class="error" style="color:red">User not found!</span>';
                                break;
                            case 'invalidLogin':
                                echo '<span class="error" style="color:red">Invalid Login!</span>';
                                break;
                        }
                    }
                    ?>
                </center>

                <!--Login form-->

                <form action="http://localhost/Quizzify/Quizzify/Includes/login.inc.php" id="Login" class="input-group1" method="POST" name="form1">
                    <br>
                    <input type="text" id="user" class="input-field" placeholder="Username" name="username" required value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>">
                    <input type="password" id="pass" class="input-field" placeholder="Password" name="password" required value="">
                    <br><br><br>
                    <input type="checkbox" id="check" name="remember_me">
                    <label for="check" style="font-size: 12px; font-family: sans-serif;" name="remember_me" onclick="setcookie()"> Remember me</label><br><br>
                    <span><a href="http://localhost/Quizzify/Quizzify/interface/php_files/resetPwd.php" name="reset">Forgot password?</a></span>
                    <br><br><span>Not yet registered?&nbsp;&nbsp;<a href="#" onclick="myFunction1()" id="reg1">Register</a></span><br><br><br>
                    <span class="error2" style="color: red;"></span><br>
                    <button type="submit" value="" class="submit-btn1" name="submit1">LogIn</button>
                </form>

                <!--Register form-->


                <form action="http://localhost/Quizzify/Quizzify/Includes/signup.inc.php" id="Register" class="input-group2" method="POST" name="form2">
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


                    <br><label style="font-size: 13px; font-family: sans-serif;">Choose your option/s</label><br>
                    
                    <br>
                    <input type="checkbox" id="" class="input-field" name="play" ><label style="font-size: 12px; font-family: sans-serif;">&nbsp;Play quiz</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="" class="input-field" name="create"><label style="font-size: 12px; font-family: sans-serif;">&nbsp;Create quiz</label><br><br>
                    <span>Already registered?&nbsp;&nbsp;<a href="" onclick="myFunction2()" id="reg2">Login</a></span><br><br>

                    <!-- <input type="checkbox" class="check-box" id="chkAgree" onclick="goFurther()" /><span>I agree to the Terms & Conditions</span><br> -->

                    <button type="submit" value="" class="submit-btn2" name="submit2" id="btn2">Register</button>
                </form>
            </div>
        </div>
    </div>

    </div>

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
        }

        function Login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }

        function myFunction1() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function myFunction2() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }

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
