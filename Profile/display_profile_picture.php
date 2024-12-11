<?php
// Your database connection logic goes here
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
// Fetch the user's profile picture BLOB from the database for the currently logged-in user (replace with your session variable)
$userID = $_SESSION['id']; // Assuming the user's ID is stored in the session
// Update the username
if (isset($_POST['new_username'])) {
    $newUsername = $_POST['new_username'];

    $query = "UPDATE dualuser SET Username = :newUsername WHERE DUser_Id = :userID";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':newUsername', $newUsername);
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();

    
}
// Update the profile picture
if (isset($_FILES['new_avatar'])) {
    $file = $_FILES['new_avatar'];

    $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);
    $fileType = exif_imagetype($file['tmp_name']);

    if (in_array($fileType, $allowedTypes)) {
        $imgData = file_get_contents($file['tmp_name']);

        $query = "UPDATE dualuser SET profile_picture = ? WHERE DUser_Id = ?";
        $stmt = $con->prepare($query);
        $stmt->bindParam(1, $imgData, PDO::PARAM_LOB);
        $stmt->bindParam(2, $userID);
        $stmt->execute();

        // Redirect back to the profile page or any other appropriate location after picture update
        header("Location: user_profile.php");
        exit();
    } else {
        echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
        // Handle error: Display a message to the user indicating the file type restriction.
    }
}
$query = "SELECT profile_picture FROM dualuser WHERE DUser_Id = :id";
$stmt = $con->prepare($query);
$stmt->bindParam(':id', $userID);
$stmt->execute();
$userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

if ($userDetails && !empty($userDetails['profile_picture'])) {
    $imageData = $userDetails['profile_picture'];
    $imageType = 'image/jpg'; // Change image type based on your stored format

    // Output the header specifying the image content type
    header("Content-type: $imageType");

    // Display the image
    echo $imageData;
} else {
    // Display a default image if the user's profile picture is not found or empty
    // Replace 'default.jpg' with the path to your default image
    readfile('http://localhost/Quizzify/Quizzify/images/IMG_1546.jpg');
}

?>
