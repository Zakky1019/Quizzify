<?php

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "quizzifynew");

$delete = $_GET['del'];

$sql = "DELETE FROM instructor WHERE Instructor_Id = '$delete'";

if (mysqli_query($connection, $sql)) {
    echo '<script>location.replace("instructor.php");</script>';
} else {
    echo "Something Error: " . $connection->error;
}

?>
 