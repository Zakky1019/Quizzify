<?php
require_once 'DbConnector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST["new_username"];

    // Create a database connection
    $dbConnector = new \classes\DbConnector();
    $con = $dbConnector->establishConnection();

    if (!$con) {
        die("Database connection failed");
    }

    // Check if the username already exists in the database
    $query = "SELECT COUNT(*) FROM user WHERE Username = :newUsername";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':newUsername', $newUsername);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo "Username is already taken.";
    } else {
        echo "Username is available.";
    }

    // Close the database connection
    $con = null;
} else {
    echo "Invalid request.";
}
?>
