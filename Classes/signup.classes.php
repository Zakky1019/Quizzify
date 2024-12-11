<?php

namespace Classes;

use PDO;

// Include the file containing the DbConnector class
require_once('DbConnector.php');


class signup extends DbConnector
{

    // creating user table

    protected function createUser($firstname, $lastname, $email, $username, $password, $confirm_password, $v_code)
    {
        $hashedpass = password_hash($password, PASSWORD_BCRYPT);
        $query = "";

        if (isset($_POST["create"]) && isset($_POST["play"])) {
            $query = "INSERT INTO dualuser (FirstName, LastName, Email, Username, Password, verification_code) VALUES (?,?,?,?,?,?)";
        } else if (isset($_POST["play"])) {
            $query = "INSERT INTO participant (FirstName, LastName, Email, Username, Password, verification_code) VALUES (?,?,?,?,?,?)";
        } else if (isset($_POST["create"])) {
            $query = "INSERT INTO instructor (FirstName, LastName, Email, Username, Password, verification_code) VALUES (?,?,?,?,?,?)";
        } else {
            header('Location:../Interface/Register.php?error=NoOptionSelected');
            exit();
        }

        $stmt = $this->connect()->prepare($query);
        $executeResult = $stmt->execute([$firstname, $lastname, $email, $username, $hashedpass, $v_code]);

        if (!$executeResult) {
            $stmt = null;
            header('Location: ../Interface/Register.php?status=registrationfailed');
            exit();
        }
    }



    function existUser($con, $username)
    {
        $query = "SELECT FirstName, LastName, Email, Username, Password FROM instructor WHERE Username = ? 
        UNION 
        SELECT FirstName, LastName, Email, Username, Password FROM participant WHERE Username = ? 
        UNION 
        SELECT FirstName, LastName, Email, Username, Password FROM dualuser WHERE Username = ?";

        $stmt = $con->prepare($query);

        if (!$stmt) {
            // if there are any errors in the database 
            header('Location: ../Interface/Register.php?error=stmtfailed');
            exit();
        }

        $stmt->execute([$username, $username, $username]);
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
        $query = "SELECT Email FROM dualuser WHERE Email=? 
        UNION SELECT Email FROM instructor WHERE Email=?
        UNION SELECT Email FROM participant WHERE Email=?;";

        $stmt = $con->prepare($query);

        if (!$stmt) {
            // if there are any errors in the database 
            header('Location: ../Interface/Register.php?error=stmtfailed');
            exit();
        }

        $stmt->execute([$email, $email, $email]);
        $resultData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultData) {
            return $resultData;
        } else {
            return false;
        }

        $stmt = null;
    }


    function verifyEmail()
    {
        $email = $_GET['email'] ?? '';

        $db = new \Classes\DbConnector();
        $con = $db->establishConnection();

        if (isset($email)) {
            $verificationSuccessful = false;

            $tables = ['dualuser', 'instructor', 'participant'];

            foreach ($tables as $table) {
                $query = "SELECT * FROM $table WHERE Email = ?";
                $stmt = $con->prepare($query);

                if (!$stmt) {
                    echo "\nPDO::errorInfo():\n";
                    print_r($con->errorInfo());
                }

                if ($stmt->execute([$email])) {
                    $resultData = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($stmt->rowCount() == 1 && $resultData['is_verified'] == 0) {
                        $updateQuery = "UPDATE $table SET is_verified = 1 WHERE Email = ?";
                        $updateStmt = $con->prepare($updateQuery);

                        if (!$updateStmt) {
                            echo "\nPDO::errorInfo():\n";
                            print_r($con->errorInfo());
                        }

                        if ($updateStmt->execute([$email])) {
                            $verificationSuccessful = true;
                            break; // Exit the loop after successful verification

                        } else {
                            // Handle update statement execution failure
                            print_r($updateStmt->errorInfo());
                        }
                    } else {

                        echo 'Verification conditions not met';
                    }
                } else {
                    // Handle select statement execution failure
                    echo 'Select statement execution failed';
                    echo "\nPDO::errorInfo():\n";
                    print_r($stmt->errorInfo());
                }
            }

            if ($verificationSuccessful) {
                // print_r('verifyicationsuccess');
                header('Location: ../Interface/Register.php?VerificationSuccess');
                exit();
            } else {
                header('Location: ../Interface/Register.php?VerificationFailed');
                // print_r('verificationfailed');
                exit();
            }
        }
    }
}
