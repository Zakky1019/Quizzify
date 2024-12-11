<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

require_once 'DbConnector.php'; // Include your database connection file

$dbConnector = new \classes\DbConnector();
$con = $dbConnector->establishConnection();

if (!$con) {
    die("Database connection failed");
}

$userID = $_SESSION['id'];

// Update the username
if (isset($_POST['new_username'])) {
    $newUsername = $_POST['new_username'];

    $query = "UPDATE user SET username = :newUsername WHERE User_Id = :userID";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':newUsername', $newUsername);
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();

    
}


// Close the database connection if no update operation is performed
$con = null;
?>
