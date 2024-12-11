<?php

// this file includes all the database related stuffs like running queries

use classes\DbConnector;

class signup extends DbConnector
{

    // creating user table

    protected function createUser($firstname, $lastname, $email, $username, $password, $confirm_password)
    {
        $query = "INSERT INTO user (First_Name, Last_Name, Email, Username, Password, Confirm_Password) VALUES (?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $hashedpass = password_hash($password, PASSWORD_BCRYPT);
        $hashedpass2 = password_hash($confirm_password, PASSWORD_BCRYPT);

        if (!$stmt->execute([$firstname, $lastname, $email, $username, $hashedpass, $hashedpass2])) {
            $stmt = null;
            header('Location: /path/to/your/page');
            //debug
            print_r('connection failed');
            exit();
        }
    }


    function existUser($con, $username)
    {
        $query = "SELECT * FROM user WHERE Username=?;";
        $stmt = $con->prepare($query);

        if (!$stmt) {
            // if there are any errors in the database 
            header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/registration.php?error=stmtfailed');
            exit();
        }

        $stmt->execute([$username]);
        $resultData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultData) {
            return $resultData;
        } else {
            return false;
        }

        $stmt = null;
    }

    function emailExist($con, $email)
    {
        $query = "SELECT * FROM user WHERE Email=?;";
        $stmt = $con->prepare($query);

        if (!$stmt) {
            // if there are any errors in the database 
            header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/registration.php?error=stmtfailed');
            exit();
        }

        $stmt->execute([$email]);
        $resultData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultData) {
            return $resultData;
        } else {
            return false;
        }

        $stmt = null;
    }
}
