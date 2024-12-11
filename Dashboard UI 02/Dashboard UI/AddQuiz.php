
<?php
include 'connect.php';

// Check if the form is submitted
if (isset($_POST['nextButton'])) {
    // Other form data
    $quiz_title = isset($_POST['quiz_title']) ? mysqli_real_escape_string($con, $_POST['quiz_title']) : '';
    $quiz_description = isset($_POST['quiz_description']) ? mysqli_real_escape_string($con, $_POST['quiz_description']) : '';
    $quiz_timelimit = isset($_POST['quiz_timelimit']) ? mysqli_real_escape_string($con, $_POST['quiz_timelimit']) : '';
    $que_limit = isset($_POST['que_limit']) ? mysqli_real_escape_string($con, $_POST['que_limit']) : '';
    $quiz_passcode = isset($_POST['quiz_passcode']) ? mysqli_real_escape_string($con, $_POST['quiz_passcode']) : '';

    // Insert quiz data into the quiz table
    $sql = "INSERT INTO `quiz` (quiz_title, quiz_description, quiz_timelimit, que_limit, quiz_passcode)
            VALUES ('$quiz_title', '$quiz_description', '$quiz_timelimit', '$que_limit', '$quiz_passcode')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        // Redirect to the Add Question page
        header("Location: AddQuestion.php");
        exit();
    } else {
        die(mysqli_error($con));
    }
}
?>
<!-- ... (your existing HTML code) ... -->

<!-- ... (your existing HTML code) ... -->



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="AddQuiz.css">
</head>
</head>

<body>

  <!-- Navigation Bar -->
  <header id="header">

    <nav>
        <div class="logo"><img src="QUIZZIFY.png" alt="logo"></div>
        <ul>
            <li><a class="active" href="">Home</a></li>
            <li><a href="../../QuizCreationapi/index.php">Quiz</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="#about_section">About us</a></li>
            <li><a href="#team_section">Team</a></li>
        </ul>
        <a class="get-started" href="../../Interface/php_files/registration.php">Get Started</a>
    </nav>

</header>
  <!--Add Quiz Form-->
  <form action = 'AddQuiz.php' method="post">

  <div class="quiz_box">

    <header>
      <div class="title">Add Quiz</div>
    </header>


    <!-- Hidden input field to store the quiz ID -->
    <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
    
    <table>
      

        
          <div class="form-element">
            <label for="quiz_description">Quiz description</label><br>
            <input type="text" id="quiz_description" name="quiz_description" style="width: 100%;"><br>
          </div>
        

      <tr>
        <td>

          <div class="form-element">
            <label for="quiz_time">Quiz Time Limit</label><br>
            <input type="text" id="quiz_time" name="quiz_timelimit" style="width: 100%;" required="required"><br>
          </div>
        </td>

        <td>

          <div class="form-element">
            <label for="question_limit">Question Limit</label><br>
            <input type="number" id="question_limit" name="que_limit" style="width: 100%;" required="required"><br>
          </div>
        </td>
      </tr>

    </table>

    <div class="form-element">
            <label for="quiz_passcode">Quiz passcode </label><br>
            <input type="text" id="quiz_passcode" name="quiz_passcode" style="width: 100%;" required="required"><br>
          </div>



    <!--Quiz Box footer-->

  
    <footer>
      <button class="next_btn" id="nextButton" name="nextButton">Add Question</button>
    </footer>
  </div>

</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
    $(document).ready(function () {
      $(".user").click(function () {
        $(".profile-div").toggle(1000);
      });
      $(".hicon:nth-child(1)").click(function () {
        $(".notification-div").toggle(1000);
      });
      $(".sicon").click(function () {
        $(".search").toggle(1000);
      });
    });
  </script>

  <script type="text/javascript">
    $('li').click(function () {
      $('li').removeClass("active");
      $(this).addClass("active");
    });
  </script>

<script>
// Add an event listener to the button
document.getElementById('nextButton').addEventListener('click', function() {
    // Redirect to addQuestion.html
    window.location.href = 'AddQuestion.php';
});
</script>

<script>
function updateQuizIdInAddQuestionForm() {
    // Get the value of the Quiz ID input field
    var quizId = document.getElementById('quiz_id').value;

    // Set the value of the Quiz ID input field in the Add Question form
    document.getElementById('quiz_id_add_question').value = quizId;
}
</script>



</body>

</html> 