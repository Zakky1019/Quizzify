

<?php
include 'connect.php';
if (isset($_POST['nextButton'])) {
  $quiz_title = isset($_POST['quiz_title']) ? mysqli_real_escape_string($con, $_POST['quiz_title']) : '';
  $quiz_description = isset($_POST['quiz_description']) ? mysqli_real_escape_string($con, $_POST['quiz_description']) : '';
  $quiz_timelimit = isset($_POST['quiz_timelimit']) ? mysqli_real_escape_string($con, $_POST['quiz_timelimit']) : '';
  $que_limit = isset($_POST['que_limit']) ? mysqli_real_escape_string($con, $_POST['que_limit']) : '';
  $quiz_passcode = isset($_POST['quiz_passcode']) ? mysqli_real_escape_string($con, $_POST['quiz_passcode']) : '';
  

  $sql = "INSERT INTO `quiz` (quiz_title, quiz_description, quiz_timelimit, que_limit, quiz_passcode )
          VALUES ('$quiz_title', '$quiz_description', '$quiz_timelimit', '$que_limit', '$quiz_passcode')";

  $result=mysqli_query($con,$sql);
  if($result){
    echo "quiz has been inserted successfully":
      
  } else{
      die(mysqli_error($con));
  }
}


?>