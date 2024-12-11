<?php

namespace Classes;

session_start();
// this file is used, if there are any changes to be done in the database
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require("../phpmailer/PHPMailer.php");
require("../phpmailer/SMTP.php");
require("../phpmailer/Exception.php");

class signupController extends signup
{
    private $firstname;
    private $lastname;
    private $email;
    private $username;
    private $password;
    private $confirm_password;


    public function __construct($firstname, $lastname, $email, $username, $password, $confirm_password)
    {
        $this->firstname = filter_var($firstname, FILTER_SANITIZE_SPECIAL_CHARS); //This filter is used to escape "<>& and characters with ASCII value below 32
        $this->lastname = filter_var($lastname, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL); //removes all illegal characters from an email address
        $this->username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->password = $password;
        $this->confirm_password = $confirm_password;
    }

    // check validation

    public function signupUser()
{
    if ($this->emptyInput() !== false) {
        header('Location: ../Interface/Register.php?error=emptyInput');
        exit();
    } else if ($this->invalidUsername() !== false) {
        header('Location: ../Interface/Register.php?error=invalidUser');
        exit();
    } else if ($this->invalidEmail() !== false) {
        header('Location: ../Interface/Register.php?error=invalidEmail');
        exit();
    } else if ($this->passwordMatch() !== false) {
        header('Location: ../Interface/Register.php?error=passwordDonotMatch');
        exit();
    } else if ($this->incorrectPwd() !== false) {
        header('Location:../Interface/Register.php?error=incorrectPwd');
        exit();
    } else if ($this->userTaken() !== false) {
        header('Location:../Interface/Register.php?error=userExists');
        exit();
    } else if ($this->emailTaken() !== false) {
        header('Location:../Interface/Register.php?error=emailExists');
        exit();
    }

    // Generate verification code
    $v_code = bin2hex(random_bytes(16));

    // Create user and store verification code
    $this->createUser($this->firstname, $this->lastname, $this->email, $this->username, $this->password, $this->confirm_password, $v_code);

    // Check if signup was successful
    if (!isset($_GET["status"]) || $_GET["status"] !== "registrationfailed") {
        // Email verification
        sendMail($this->username, $this->email, $v_code);
        header('Location: ../Interface/Register.php?status=emailsent');
        exit();

    } else {
        // Redirect to a page indicating registration failure
        header('Location: ../Interface/Register.php?status=registrationfailed');
        exit();
    }
}


    private function emptyInput()
    {
        if (empty($this->firstname) || empty($this->lastname) || empty($this->email) || empty($this->username) || empty($this->password) || empty($this->confirm_password)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function invalidUsername()
    {
        if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $this->username)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    private function invalidEmail()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function userTaken()
    {

        if ($this->existUser($this->connect(), $this->username)) {
            $results = true;
        } else {
            $results = false;
        }
        return $results;
    }

    private function emailTaken()
    {

        if ($this->emailExist($this->connect(), $this->email)) {
            $results = true;
        } else {
            $results = false;
        }
        return $results;
    }

    private function passwordMatch()
    {
        if ($this->password != $this->confirm_password) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function incorrectPwd()
    {
        if ((strlen($this->password) < 8)  && (!preg_match('/^[a-zA-Z0-9]$/', $this->password))) {
            $results = true;
        } else {
            $results = false;
        }
        return $results;
    }
}

function sendMail($username, $email, $v_code)
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
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Email verification from Quizzify';
        $mail->Body = "<center>
        <div style='padding: 20px; background-color: #f8f9fa; border-radius: 5px; font-family: Arial, sans-serif; width: 40%'>
            <h1 style='color: #4AA017; text-align: center;'>Welcome to <br> Quizzify</h1>The Joy Ride<br><br>
            <p style='color: #333; text-align: center;'>
            You're one step away from enjoying all the benefits of our platform. All you need to do is verify your account by clicking the link below. It will only take a few seconds and it will ensure that your account is secure and authentic.
            </p>
            <div style='text-align: center; margin: 20px 0;'>
                <a href='http://localhost/reg/Classes/verify.php?email=$email&v_code=$v_code&verified' style='background-color: #4AA017; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>
                    Verify my account
                </a>
            </div>
            <p style='color: #333; text-align: center; font-weight: bold;'>
            Thank you for choosing us and we hope you have a wonderful experience with us!
            </p>
        </div></center>";
            $mail->send();
    } catch (Exception $e) {
        $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}
