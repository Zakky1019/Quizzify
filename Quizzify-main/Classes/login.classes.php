<?php
use classes\DbConnector;

class Login extends DbConnector
{
    protected function getUser($username, $password)
    {
        // Check if it's an admin login
        $queryAdmin = "SELECT * FROM admin_login WHERE Login_user=?";
        $stmtAdmin = $this->connect()->prepare($queryAdmin);

        if (!$stmtAdmin->execute([$username])) {
            header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/registration.php?error=statementFailed');
            exit();
        }

        $admin = $stmtAdmin->fetch(PDO::FETCH_ASSOC);

        if ($admin) {
            
           // Admin login
           session_start();
           $_SESSION["id"] = $admin["Admin_Login_Id"];
           $_SESSION["username"] = $admin["Login_user"];
           header("Location: http://localhost/Quizzify/Quizzify/dashboard3/dashboard.php");
           exit();
        }

        // If it's not an admin, check if it's a regular user
        $query = "SELECT * FROM user WHERE Username=?";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$username])) {
            header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/registration.php?error=statementFailed');
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Regular user login
            $hashedPassword = $user["Password"]; 
            if (password_verify($password, $hashedPassword)) {
                session_start();
                $_SESSION["id"] = $user["User_Id"];
                $_SESSION["username"] = $user["Username"];
                
                
                if (isset($_POST['remember_me'])) {
                    // Set a cookie for the username
                    $cookie_name = "username";
                    $cookie_value = $user["Username"]; // Change this to the actual username field
                    
                    $expiration_time = time() + (60*60*24) * 1; // Cookie will expire in a days
                    setcookie($cookie_name, $cookie_value, $expiration_time, "/");
                }

                // Check if the user is also an admin
                if (isset($user["Admin_Login_Id"])) {
                    // Admin login
                    header("Location: http://localhost/Quizzify/Quizzify/dashboard/dashboard/Dashboard.php");
                } else {
                    // Regular user login
                    $insertQuery = "INSERT INTO login (User_Id, Login_time, Login_date) VALUES (:id, CURRENT_TIME(), CURRENT_DATE())";
                    $insertStmt = $this->connect()->prepare($insertQuery);
                    $insertStmt->bindParam(':id', $_SESSION["id"]);
                    $insertStmt->execute();
                    header("Location: http://localhost/Quizzify\Quizzify/Interface/php_files/chooseRole.php");
                }
                exit();
            }
        }

        // If neither regular user nor admin is found, it's an invalid login
        header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/registration.php?error=invalidLogin');
        exit();
    }

    
   
}
