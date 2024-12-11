<?php
session_start();

include "../Classes/DbConnector.php"; // Assuming this file contains your database connection logic

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require("../phpmailer/PHPMailer.php");
require("../phpmailer/SMTP.php");
require("../phpmailer/Exception.php");

function send_password_reset($getName, $getEmail, $token)
{
    try {
        $mail = new PHPMailer(true);

        

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'Quizzify2023@gmail.com';
        $mail->Password   = 'hxmtidoltxsdqalr';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('Quizzify2023@gmail.com', 'Quizzify');
        $mail->addAddress($getEmail);

        $mail->isHTML(true);
        $mail->Subject = 'Reset password notification';
        $mail->Body = "
        <div style='padding: 20px; background-color: #f8f9fa; border-radius: 5px; font-family: Arial, sans-serif;'>
        <h2 style='color: #333; text-align: center;'>Hello $getName !</h2>
        <p style='color: #333; text-align: center;'>
            We received a request to reset your password associated with this e-mail address. If you made this request, please follow the link below.
        </p>
        <div style='text-align: center; margin: 20px 0;'>
            <a href='http://localhost/reg/Interface/reset_pwd.php?token=$token&email=$getEmail' style='background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>
                To reset password, Click Me!
            </a>
        </div>
        <p style='color: #333; text-align: center;'>
            If you did not request to have your password reset, you can safely ignore this email. Rest assured your account is safe.
        </p>
        <p style='color: #333; text-align: center; font-weight: bold;'>
            The link will expire in 2 minutes.
        </p>
    </div>
    ";
        
        $mail->send();
    } catch (Exception $e) {
        $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}


$db = new \Classes\DbConnector();
$con = $db->establishConnection();

if (isset($_POST["submit"])) {
    $email = $_POST['email'];

    $token = bin2hex(random_bytes(16));
    $expiry = date('Y-m-d H:i:s', strtotime('+2 minutes'));


    $check_email = "SELECT Email, Username FROM dualuser WHERE Email=?
   UNION 
   SELECT Email, Username FROM instructor WHERE Email=?
   UNION 
   SELECT Email, Username FROM participant WHERE Email=?";

    $stmt = $con->prepare($check_email);
    $stmt->execute([$email, $email, $email]);

    if (empty($_POST['email'])) {
        header("Location: ../Interface/ForgotPwd.php?error=emptyInput");
        exit(0);
    } else if ($stmt->rowCount() > 0) {

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $getName = $row['Username'];
        $getEmail = $row['Email'];

        echo "Fetched Email: $getEmail"; // Check the fetched email

        // Prepare and execute the UPDATE queries
        $tables = ['dualuser', 'instructor', 'participant'];

        foreach ($tables as $table) {
            $update_token_query = "UPDATE $table SET verification_code=:token, expiry=:expiry WHERE Email=:email";

            $stmt_update_token = $con->prepare($update_token_query);
            $stmt_update_token->bindParam(':token', $token);
            $stmt_update_token->bindParam(':expiry', $expiry);
            $stmt_update_token->bindParam(':email', $getEmail);
            $stmt_update_token->execute();

            if ($stmt_update_token->rowCount() > 0) {
                // At least one row was updated, you can break the loop if desired
                break;
            }
        }


        if ($stmt->rowCount() > 0) {

            send_password_reset($getName, $getEmail, $token);
            header("Location: ../Interface/ForgotPwd.php?status=linkSent");
            exit(0);
        } else {

            header("Location: ../Interface/ForgotPwd.php?error=emailNotFound");
            exit(0);
        }
    } else {

        header("Location: ../Interface/ForgotPwd.php?error=somethingWentWrong");
        exit(0);
    }
}
if (isset($_POST['update'])) {
    $email = $_POST['email'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $token = $_POST['token'];

    // Set values in session for persistent data
    $_SESSION['reset_token'] = $token;
    $_SESSION['reset_email'] = $email;

    // // Add these lines to clear the session values
    // unset($_SESSION['reset_token']);
    // unset($_SESSION['reset_email']);


    if (isset($token)) {


        if (empty($email) || empty($newPassword) || empty($confirmPassword)) {
            header("Location: ../Interface/reset_pwd.php?error=EmptyField");
            exit(0);
        } else {
            $checkToken = "SELECT 'dualuser' AS source, verification_code, expiry, token_timestamp FROM dualuser WHERE verification_code = :token
            UNION 
            SELECT 'instructor' AS source, verification_code, expiry, token_timestamp FROM instructor WHERE verification_code = :token
            UNION 
            SELECT 'participant' AS source, verification_code, expiry, token_timestamp FROM participant WHERE verification_code = :token";
            
            $stmt = $con->prepare($checkToken);
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $tokenExpiry = strtotime($result['expiry']);
                $tokenTimestamp = strtotime($result['token_timestamp']);
                $currentTimestamp = time();
    
                if ($currentTimestamp > $tokenExpiry || $currentTimestamp - $tokenTimestamp > 10 * 60) {
                    // Token has expired
                    header("Location: ../Interface/reset_pwd.php?error=TokenExpired");
                    exit(0);
                }

                if ($newPassword !== $confirmPassword) {
                    header("Location: ../Interface/reset_pwd.php?error=passwordsDoNotMatch");
                    exit(0);
                } else if (!preg_match('/^[a-zA-Z0-9]+$/', $newPassword)) {
                    header("Location: ../Interface/reset_pwd.php?error=incorrectPassword");
                    exit(0);
                } else {

                    // Hash the new password
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    // Prepare and execute the UPDATE queries
                    $tables = ['dualuser', 'instructor', 'participant'];
                    $success = false;

                    foreach ($tables as $table) {
                        $updatePassword = "UPDATE $table SET Password=:hashedPassword WHERE verification_code=:token";
                    
                        $stmtUpdate = $con->prepare($updatePassword);
                        $stmtUpdate->bindParam(':hashedPassword', $hashedPassword);
                        $stmtUpdate->bindParam(':token', $token);
                        $stmtUpdate->execute();
                    
                        if ($stmtUpdate->rowCount() > 0) {
                            // At least one row was updated, set $success to true and break the loop
                            $success = true;
                            break;
                        }
                    }

                    if ($success) {
                        header("Location: ../Interface/reset_pwd.php?status=PasswordUpdated");
                        exit(0);
                    } else {
                        header("Location: ../Interface/reset_pwd.php?error=SessionExpired");
                        exit(0);
                    }
                }
            }
        }
    } else {
        header("Location: ../Interface/reset_pwd.php?error=tokenNotAvailable");
        exit(0);
    }
}
