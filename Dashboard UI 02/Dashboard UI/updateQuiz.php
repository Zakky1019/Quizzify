<?php
include 'connect.php';
$quiz_id=$_GET['updateid'];
$sql="select * from `quiz` where quiz_id=$quiz_id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$quiz_title=$row['quiz_title'];
$quiz_description=$row['quiz_description'];
$quiz_time=$row['quiz_timelimit'];
$question_limit=$row['que_limit'];
$quiz_passcode=$row['quiz_passcode'];

if(isset($_POST['nextButton'])) {
    $quiz_title=$_POST['quiz_title'];
    $quiz_description=$_POST['quiz_description'];
    $quiz_time=$_POST['quiz_timelimit'];
    $question_limit=$_POST['que_limit'];
    $quiz_passcode=$_POST['quiz_passcode'];

    $sql="update `quiz` set quiz_id=$quiz_id,quiz_title='$quiz_title',quiz_description='$quiz_description',quiz_timelimit='$quiz_time',que_limit=$question_limit,quiz_passcode='$quiz_passcode' where quiz_id=$quiz_id";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:manageQuiz.php');
    } else{
        die(mysqli_error($con));
    }
}


?>



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
  <form method="post">

  <div class="quiz_box">

    <header>
      <div class="title">Add Quiz</div>
    </header>


    <table>
        

      <tr>
        <td>
          <div class="form-element">
            <label for="quiz_title">Quiz Title</label><br>
            <input type="text" id="quiz_title" name="quiz_title" style="width: 100%;" required="required" value=<?php echo $quiz_title;?>><br>
          </div>
        </td>

        <td>
          <div class="form-element">
            <label for="quiz_description">Quiz description</label><br>
            <input type="text" id="quiz_description" name="quiz_description" style="width: 100%;" required="required" value=<?php echo $quiz_description;?>><br>
          </div>
        </td>
      </tr> <br>

      <tr>
        <td>

          <div class="form-element">
            <label for="quiz_time">Quiz Time Limit</label><br>
            <input type="text" id="quiz_time" name="quiz_timelimit" style="width: 100%;" required="required" value=<?php echo $quiz_time;?>><br>
          </div>
        </td>

        <td>

          <div class="form-element">
            <label for="question_limit">Question Limit</label><br>
            <input type="number" id="question_limit" name="que_limit" style="width: 100%;" required="required" value=<?php echo $question_limit;?>><br>
          </div>
        </td>
      </tr>

    </table>

    <div class="form-element">
            <label for="quiz_passcode">Quiz passcode </label><br>
            <input type="text" id="quiz_passcode" name="quiz_passcode" style="width: 100%;" required="required" value=<?php echo $quiz_passcode;?> ><br>
          </div>



    <!--Quiz Box footer-->
    <footer>
      <button class="next_btn" id="nextButton" name="nextButton">Update</button>
    </footer>
  </div>

</form>


  <!-- FOOTER -->
<footer>
  <div class="footer-container">
      <div class="left-col">
          <img src="QUIZZIFY-preview.png" style="width: 200px;">
          <div class="logo"></div>

          <p class="rights-text">Copyright © 2023 Created By UWU TEAM, All Rights Reserved.</p>
          <br>
          <p><img src="location.png"> Passara Road, Badulla</p><br>
          <p><img src="phone.png"> 055-222-4446<br>
          <!-- <p><img src="../../images/icon/mail.png">&nbsp; </p> -->
      </div>
      <div class="right-col">
          <h1 style="color: #fff">Our Newsletter</h1>
          <div class="border"></div><br>
          <p>Enter Your Email to get our News and updates.</p>
          <form class="newsletter-form">
              <input class="txtb" type="email" placeholder="Enter Your Email">
              <input class="btn" type="submit" value="Submit">
          </form>
      </div>
  </div>
</footer> 

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
    window.location.href = 'addQuestion.php';
});
</script>


</body>

</html>