<?php
session_start();

if (!isset($_SESSION["id"])) {
    // Redirect to the login page or handle the case when the user is not logged in.
    header("Location: login.php"); // Replace "login.php" with your actual login page URL.
    exit();
}

require_once 'DbConnector.php'; // Include the DbConnector class file.

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the User_Id and new username from the form
    $userID = $_POST["User_Id"];
    $newUsername = $_POST["new_username"];
    
    // Create a database connection
    $dbConnector = new \classes\DbConnector();
    $con = $dbConnector->establishConnection();

    if (!$con) {
        // Handle database connection error.
        die("Database connection failed");
    }

    // Update the username in the database
    $query = "UPDATE user SET Username = :newUsername WHERE User_Id = :userID";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':newUsername', $newUsername);
    $stmt->bindParam(':userID', $userID);

    if ($stmt->execute()) {
        // Redirect to user_profile.php without displaying any message
        header("Location: http://localhost/Quizzify/Quizzify/Interface/php_files/user_profile.php?User_Id=$userID");
        exit();
    } else {
        // Handle the case when the update fails
        echo "Username update failed!";
    }

    // Close the database connection.
    $con = null;
} else {
    // Redirect to the edit profile page if the form is not submitted
    header("Location: edit_user.php");
    exit();
}
?>
