<?php
namespace Classes;

use Classes\DbConnector;

class pwd_resetController extends pwd_reset
{
    public function userExists($username, $email) {
        $query = 'SELECT * FROM user WHERE Username=? AND Email=?';
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$username, $email])) {
            return false; // Error executing query
        }

        return $stmt->rowCount() > 0;
    }

    public function resetUser($username, $email, $password, $confirm_password) {
        // Check if passwords match and other validation if needed
        if ($password !== $confirm_password) {
            return false; // Passwords don't match
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Update the password
        $query = 'UPDATE user SET Password = ?, confirm_Password = ? WHERE Username=? AND Email=?';
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$hashedPassword, $hashedPassword, $username, $email])) {
            return false; // Error updating password
        }

        return true; // Password reset successful
    }

    
}
?>
