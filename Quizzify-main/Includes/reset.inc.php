<?php
if (isset($_POST["submit"])) { // Changed to check if "submit" is set
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $confirm_password = $_POST["conPass"];

    // Include necessary classes
    include "../Classes/DbConnector.php";
    include "../Classes/reset.classes.php";
    include "../Classes/reset-controller.php";

    // Validation checks
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/resetPwd.php?error=emptyInput');
        exit();
    } elseif ($password !== $confirm_password) {
        header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/resetPwd.php?error=passwordDoNotMatch');
        exit();
    } else if((strlen($password) < 8)  && (!preg_match('/^[a-zA-Z0-9]$/', $password))){
        header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/resetPwd.php?error=invalidPwd');
        exit();
    }

    // Create an instance of the controller
    $resetController = new \Classes\pwd_resetController();

    // Check if the user exists
    if ($resetController->userExists($username, $email)) {
        // Reset the password
        if ($resetController->resetUser($username, $email, $password, $confirm_password)) {
            // Password reset successful
            header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/resetPwd.php?success=reset'); 
            exit();
        } else {
            // Password reset failed
            header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/resetPwd.php?error=resetFailed'); 
            exit();
        }
    } else {
        // User not found
        header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/resetPwd.php?error=userNotFound'); 
        exit();
    }
}
?>
