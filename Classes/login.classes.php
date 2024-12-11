<?php

use classes\DbConnector;

class Login extends DbConnector
{
    protected function getUser($username, $password)
    {
        // Check if it's an admin login
        $query = "SELECT * FROM admin_login WHERE Username=?";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$username])) {
            header('Location: ../Interface/Register.php?error=statementFailed');
            exit();
        }

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin) {
            // Admin login
            session_start();
            $_SESSION["id"] = $admin["Admin_Login_Id"];
            $_SESSION["username"] = $admin["Login_user"];
            $_SESSION["user_type"] = "admin";
            header("Location: ../Interface/index.php");
            exit();
        }

        // Check if it's a dual user login
        $query = "SELECT * FROM dualuser WHERE Username=?";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$username])) {
            header('Location: ../Interface/Register.php?error=statementFailed');
            exit();
        }

        $dualuser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dualuser) {
            if ($dualuser['is_verified'] == 1) {
                // Dual user login
                $hashedPassword = $dualuser["Password"];
                if (password_verify($password, $hashedPassword)) {
                    session_start();
                    $_SESSION["id"] = $dualuser["DUser_Id"];
                    $_SESSION["username"] = $dualuser["Username"];
                    $_SESSION["user_type"] = "dual";

                    if (isset($_POST['remember_me'])) {
                        // Set cookies for both username and password (NOT RECOMMENDED FOR PASSWORD)
                        $cookie_name_username = "username";
                        $cookie_value_username = $dualuser["Username"];
                        $cookie_name_password = "password";
                        $cookie_value_password = $password; // Store password as plaintext (NOT RECOMMENDED)

                        $expiration_time = time() + 5 * 60; // Cookie will expire in 5 minutes
                        setcookie($cookie_name_username, $cookie_value_username, $expiration_time, "/");
                        setcookie($cookie_name_password, $cookie_value_password, $expiration_time, "/");

                        // Generate a secure token for password
                        $token = bin2hex(random_bytes(32)); // 32 bytes will generate a 64-character hexadecimal token
                        $hashedToken = password_hash($token, PASSWORD_BCRYPT);

                        // Set a cookie for the hashed token
                        $cookie_name_token = "token";
                        $cookie_value_token = $hashedToken;
                        setcookie($cookie_name_token, $cookie_value_token, $expiration_time, "/");
                    }


                    // Check if the user is also an admin
                    if (isset($dualuser["Admin_Login_Id"])) {
                        // Admin login
                        header("Location: ../Interface/AdminDashboard.php");
                    } else {
                        // Dual user login
                        $insertQuery = "INSERT INTO Dual_login (DUser_Id, Username, Login_date) VALUES (?, ?, CURRENT_DATE())";
                        $insertStmt = $this->connect()->prepare($insertQuery);
                        $insertStmt->execute([$_SESSION["id"], $_SESSION["username"]]);
                        header("Location: ../Interface/chooseRole.php");
                    }
                    exit();
                }
            } else {
                header('Location: ../Interface/Register.php?error=NotVerified');
                exit();
            }
        }

        // Check if it's a participant login
        $query = "SELECT * FROM participant WHERE Username=?";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$username])) {
            header('Location: ../Interface/Register.php?error=statementFailed');
            exit();
        }

        $participant = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($participant) {
            if ($participant['is_verified'] == 1) {
                // Participant login
                $hashedPassword = $participant["Password"];
                if (password_verify($password, $hashedPassword)) {
                    session_start();
                    $_SESSION["id"] = $participant["Participant_Id"];
                    $_SESSION["username"] = $participant["Username"];
                    $_SESSION["user_type"] = "participant";

                    if (isset($_POST['remember_me'])) {
                        // Set cookies for both username and password (NOT RECOMMENDED FOR PASSWORD)
                        $cookie_name_username = "username";
                        $cookie_value_username = $participant["Username"];
                        $cookie_name_password = "password";
                        $cookie_value_password = $password; // Store password as plaintext (NOT RECOMMENDED)

                        $expiration_time = time() + 5 * 60; // Cookie will expire in 5 minutes
                        setcookie($cookie_name_username, $cookie_value_username, $expiration_time, "/");
                        setcookie($cookie_name_password, $cookie_value_password, $expiration_time, "/");

                        // Generate a secure token for password
                        $token = bin2hex(random_bytes(32)); // 32 bytes will generate a 64-character hexadecimal token
                        $hashedToken = password_hash($token, PASSWORD_BCRYPT);

                        // Set a cookie for the hashed token
                        $cookie_name_token = "token";
                        $cookie_value_token = $hashedToken;
                        setcookie($cookie_name_token, $cookie_value_token, $expiration_time, "/");
                    }

                    // Check if the participant is also an admin
                    if (isset($participant["Admin_Login_Id"])) {
                        // Admin login
                        header("Location: ../Interface/AdminDashboard.php");
                    } else {
                        // Participant login
                        $insertQuery = "INSERT INTO Participant_Login (Participant_Id, Username, Login_date) VALUES (?, ?, CURRENT_DATE())";
                        $insertStmt = $this->connect()->prepare($insertQuery);
                        $insertStmt->execute([$_SESSION["id"], $_SESSION["username"]]);
                        header("Location: ../Interface/chooseRole.php");
                    }
                    exit();
                }
            } else {
                header('Location: ../Interface/Register.php?error=NotVerified');
                exit();
            }
        }

        // Check if it's an instructor login
        $query = "SELECT * FROM instructor WHERE Username=?";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$username])) {
            header('Location: ../Interface/Register.php?error=statementFailed');
            exit();
        }

        $instructor = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($instructor) {
            if ($instructor['is_verified'] == 1) {
                // Instructor login
                $hashedPassword = $instructor["Password"];
                if (password_verify($password, $hashedPassword)) {
                    session_start();
                    $_SESSION["id"] = $instructor["Instructor_Id"];
                    $_SESSION["username"] = $instructor["Username"];
                    $_SESSION["user_type"] = "instructor";

                    if (isset($_POST['remember_me'])) {
                        // Set cookies for both username and password (NOT RECOMMENDED FOR PASSWORD)
                        $cookie_name_username = "username";
                        $cookie_value_username = $instructor["Username"];
                        $cookie_name_password = "password";
                        $cookie_value_password = $password; // Store password as plaintext (NOT RECOMMENDED)

                        $expiration_time = time() + 5 * 60; // Cookie will expire in 5 minutes
                        setcookie($cookie_name_username, $cookie_value_username, $expiration_time, "/");
                        setcookie($cookie_name_password, $cookie_value_password, $expiration_time, "/");

                        // Generate a secure token for password
                        $token = bin2hex(random_bytes(32)); // 32 bytes will generate a 64-character hexadecimal token
                        $hashedToken = password_hash($token, PASSWORD_BCRYPT);

                        // Set a cookie for the hashed token
                        $cookie_name_token = "token";
                        $cookie_value_token = $hashedToken;
                        setcookie($cookie_name_token, $cookie_value_token, $expiration_time, "/");
                    }

                    // Check if the instructor is also an admin
                    if (isset($instructor["Admin_Login_Id"])) {
                        // Admin login
                        header("Location: ../Interface/AdminDashboard");
                    } else {
                        // Instructor login
                        $insertQuery = "INSERT INTO Instructor_Login (Instructor_Id, Username, Login_date) VALUES (?, ?, CURRENT_DATE())";
                        $insertStmt = $this->connect()->prepare($insertQuery);
                        $insertStmt->execute([$_SESSION["id"], $_SESSION["username"]]);
                        header("Location: ../Interface/chooseRole.php");
                    }
                    exit();
                }
            } else {
                header('Location: ../Interface/Register.php?error=NotVerified');
                exit();
            }
        }

        // If neither regular user nor admin nor instructor is found, it's an invalid login
        header('Location: ../Interface/Register.php?error=invalidLogin');
        exit();
    }
}
