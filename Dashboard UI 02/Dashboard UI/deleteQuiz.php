<?php
include 'connect.php';
if(isset($_GET['deleteid'])) {
    $quiz_id=$_GET['deleteid'];

    $sql="delete from `quiz` where quiz_id=$quiz_id";
    $result=mysqli_query($con,$sql);
    if($result) {
        header('location:manageQuiz.php');
    } else {
        die(mysqli_error($con));
    }

}


?>