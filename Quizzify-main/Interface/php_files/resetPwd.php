<!DOCTYPE html>
<html lang="en">

<head>
<link rel="shortcut icon" type="png" href="http://localhost/Quizzify/Quizzify/images/icon2.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../css_files/reset.css">
</head>

<body>
    <div class="main">
        <div class="form">
            <div class="heading"></div>

            <!-- change password -->
            <form action="http://localhost/Quizzify/Quizzify/Includes/reset.inc.php" class="input-group" method="POST"> <!-- Removed the full URL -->
                <br><br>
                <h1 style="font-size: 20px; margin-top: 2px;">Confirm your Details to change password</h1><br>
                

                <center class="error">
                    <!-- display error -->
                    <?php
                    if (isset($_GET['error'])) {
                        $error = $_GET['error'];
                        switch ($error) {
                                // registration error handling
                        
                            case 'emptyInput':
                                echo '<span class="error" style="color:red;">All fields are required.</span>';
                                break;
                            case 'userNotFound':
                                echo '<span class="error" style="color:red;">User not found!</span>';
                                break;
                            case 'passwordDoNotMatch':
                                echo '<span class="error" style="color:red;">Passwords do not match</span>';
                                break;
                            case 'resetFailed':
                                echo '<span class="error" style="color:red;">Reset Failed</span>';
                                break;
                            case 'invalidPwd':
                                echo '<span class="error" style="color:red">Password should have <br>Uppercase, Lowercase, Numbers and 8 characters.</span>';
                                break;
                        }
                    }

                    else if (isset($_GET['success'])) {
                        $success = $_GET['success'];
                        switch ($success) {
                                // registration success handling
                            case 'reset':
                                echo '<span class="error" style="color:green; ">Reset Success!.<br><a href="http://localhost/New/Interface/php_files/registration.php">Login</a></span>';
                                break;
                        
                        }
                    }
                    ?>
                </center>

                <input type="text" name="email" placeholder="Enter your email" class="input-field" required>
                <input type="text" name="username" class="input-field" placeholder="Enter your username" required>
                <input type="password" name="pass" class="input-field" placeholder="Enter your new password" required>
                <input type="password" name="conPass" class="input-field" placeholder="Confirm your new password" required>
                <br><br>
                <input type="submit" name="submit" value="Confirm" class="submit-btn"> 
            </form>
        </div>
    </div>
</body>

</html>