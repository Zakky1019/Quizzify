<?php
session_start(); // Start a session

$servername = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "quizzify";

$con = mysqli_connect($servername, $dbuser, $dbpassword, $dbname);

if (!$con) {
    die("Connection to Database failed: " . mysqli_connect_error());
}

if (isset($_POST["oldPassword"]) && isset($_POST["newPassword"]) && isset($_POST["confirmNewPassword"])) {
    // Get user data from session
    $userId = $_SESSION['User_Id'];
    $currentPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmNewPassword = $_POST["confirmNewPassword"];

    // Retrieve user ID from URL parameter
    if (isset($_GET["User_Id"])) {
        $userIdFromUrl = $_GET["User_Id"];

        // Check if the user ID from the URL matches the one in the session
        if ($userId == $userIdFromUrl) {
            // Validate the old and new passwords (You can add more validation as needed)
            // For example, check if the current password matches the one stored in the database
            $dbinfo = "SELECT Password FROM user WHERE User_Id='$userId'";
            $dbresult = mysqli_query($con, $dbinfo);

            if ($dbresult && mysqli_num_rows($dbresult) > 0) {
                $row = mysqli_fetch_assoc($dbresult);
                $storedPassword = $row['Password'];

                // Compare the entered current password with the stored hashed password
                if (password_verify($currentPassword, $storedPassword)) {
                    // Passwords match, proceed with password change
                    if ($newPassword === $confirmNewPassword) {
                        // Hash the new password for storage
                        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                        // Update the password in the database with the newly hashed password
                        $updateQuery = "UPDATE user SET Password='$hashedPassword' WHERE User_Id='$userId'";
                        $updateResult = mysqli_query($con, $updateQuery);

                        if ($updateResult) {
                            // Password updated successfully
                            echo "Password changed successfully!";
                        } else {
                            // Error updating the password
                            echo "Error changing password. Please try again.";
                        }
                    } else {
                        // New password and confirmation do not match
                        echo "New password and confirmation do not match.";
                    }
                } else {
                    // Current password is incorrect
                    echo "Current password is incorrect.";
                }
            } else {
                // Unable to retrieve user data from the database
                echo "Error retrieving user data. Please try again.";
            }
        } else {
            // User ID from URL does not match the one in the session
            echo "Unauthorized access.";
        }
    } else {
        // User ID not found in the URL parameter
        echo "User ID not provided.";
    }
} else {
    // Form fields are not set
    echo "Form fields are not set.";
}

// Close the database connection
mysqli_close($con);
?>
