<?php
// Example verification script (verify.php)

use Classes\signup;

require_once('DbConnector.php');
require_once('signup.classes.php');

// Extract parameters from the link
$email = $_GET['email'] ?? '';
$v_code = $_GET['v_code'] ?? '';


if (!empty($email) && !empty($v_code)) {
    // Call verifyEmail function
    $signup = new signup(); // You might need to adjust this instantiation based on your code structure
    $signup->verifyEmail($email, $v_code);
    print_r('verifyEmailDone');
    // Redirect or display a success message
    // header('Location: ../Interface/Register.php?verified');
    exit();
} else {
    // Handle invalid or missing parameters
    // header('Location: ../Interface/VerificationError.php');
    exit();
}
