<?php

// this file is used, if there are any changes to be done in the database

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
            header('Location:http://localhost/Quizzify\Quizzify/Interface/php_files/registration.php?error=emptyInput');
            //debug
            // print_r("empty input");
            exit();
        }
         else if ($this->invalidUsername() !== false) {
            header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/registration.php?error=invalidUser');
            //debug
            // print_r("invalid username");
            exit();
        }
        else if ($this->invalidEmail() !== false) {
            header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/registration.php?error=invaliEmail');
            //debug
            // print_r("invalid email");
            exit();
        }
        else if ($this->passwordMatch() !== false) {
            header('Location:http://localhost/Quizzify\Quizzify/Interface/php_files/registration.php?error=passwordDonotMatch');
            //debug
            // print_r("passwords do not match");
            exit();
        }

        else if ($this->incorrectPwd() !== false) {
            header('Location:http://localhost/Quizzify\Quizzify/Interface/php_files/registration.php?error=incorrectPwd');
            //debug
            // print_r("incorrectpwd");
            // print_r ($this->password);

            exit();
        }

        else if ($this->userTaken() !== false) {
            header('Location:http://localhost/Quizzify\Quizzify/Interface/php_files/registration.php?error=userExists');
            //debug
            // print_r("UserAlready exists");
            exit();
        }

        else if ($this->emailTaken() !== false) {
            header('Location:http://localhost/Quizzify\Quizzify/Interface/php_files/registration.php?error=emailExists');
            //debug
            // print_r("email already exists");
            exit();
        }

        $this->createUser($this->firstname, $this->lastname, $this->email, $this->username, $this->password, $this->confirm_password);
        
    }

    private function emptyInput()
    {
        if (empty($this->firstname) || empty($this->lastname) || empty($this->email) || empty($this->username) || empty($this->password) || empty($this->confirm_password) ) {
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
        
        if($this->existUser($this->connect(), $this->username)){
            $results = true;
        }
        else{
            $results = false;
        }
        return $results;
    }

    private function emailTaken()
    {
        
        if($this->emailExist($this->connect(), $this->email)){
            $results = true;
        }
        else{
            $results = false;
        }
        return $results;
    }

    private function passwordMatch()
    {
        if ($this->password != $this->confirm_password ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function incorrectPwd()
    {
        if((strlen($this->password) < 8)  && (!preg_match('/^[a-zA-Z0-9]$/', $this->password))){
            $results = true;
        }
        else{
            $results = false;
        }
        return $results;
    }
}
