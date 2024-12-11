<?php 

// admin-login.classes.php

use classes\DbConnector;

class AdminLogin extends DbConnector
{
    protected function getAdmin($username, $password)
    {
        $query = "SELECT Login_pass FROM admin_login WHERE Login_user=?;";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$username])) {
            $stmt = null;
            header('Location:');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            // print_r("1");
            header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/registration.php?error=userNotFound');
            exit();
        }

        $hashedPassword = $stmt->fetch(PDO::FETCH_ASSOC)['Login_pass'];
        if (!password_verify($password, $hashedPassword)) {
            $stmt = null;
            header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/registration.php?error=invalidLogin');
            // print_r("2");
            exit();
        }

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        // Admin login successful
        session_start();
        $_SESSION["id"] = $admin["Admin_Login_Id"];
        $_SESSION["username"] = $admin["Login_user"];

        // Update another table with admin login information
        $stmt = $this->connect()->prepare("INSERT INTO admin (User_Id, Admin_Id) VALUES (:id, :id");
        $stmt->bindParam(':id', $_SESSION["id"]);
        $stmt->execute();
        // print_r("3");
        header("Location: http://localhost/Quizzify\Quizzify/Interface/php_files/adminDashboard.php");
        exit();
    }
}
