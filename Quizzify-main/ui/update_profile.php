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

if (isset($_POST["check_username"])) {
    $newUsername = $_POST["check_username"];

    // Check if the new username is available in the database
    $checkQuery = "SELECT User_Id FROM user WHERE Username='$newUsername'";
    $checkResult = mysqli_query($con, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        // Username is already taken
        echo json_encode(["available" => false]);
    } else {
        // Username is available
        echo json_encode(["available" => true]);
    }
} elseif (isset($_POST["User_id"]) && isset($_POST["new_username"])) {
    $userId = $_POST["User_id"];
    $newUsername = $_POST["new_username"];

    // Update the username in the database
    $updateQuery = "UPDATE user SET Username='$newUsername' WHERE User_Id='$userId'";
    $updateResult = mysqli_query($con, $updateQuery);

    if ($updateResult) {
        // Username updated successfully
        echo json_encode(["success" => true]);
    } else {
        // Error updating the username
        echo json_encode(["success" => false]);
    }
}
?>
