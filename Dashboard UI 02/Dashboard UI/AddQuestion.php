<?php
include 'connect.php';

// Check if the form is submitted
if (isset($_POST['s-btn'])) {
    // Get question data from the form
    $quiz_id = isset($_POST['quiz_id']) ? intval($_POST['quiz_id']) : 0;
    $question = isset($_POST['question']) ? mysqli_real_escape_string($con, $_POST['question']) : '';
    $choice01 = isset($_POST['choice01']) ? mysqli_real_escape_string($con, $_POST['choice01']) : '';
    $choice02 = isset($_POST['choice02']) ? mysqli_real_escape_string($con, $_POST['choice02']) : '';
    $choice03 = isset($_POST['choice03']) ? mysqli_real_escape_string($con, $_POST['choice03']) : '';
    $choice04 = isset($_POST['choice04']) ? mysqli_real_escape_string($con, $_POST['choice04']) : '';
    $correctanswer = isset($_POST['correctanswer']) ? mysqli_real_escape_string($con, $_POST['correctanswer']) : '';

    // Insert question data into the question table
    $sql = "INSERT INTO `question` (quiz_id, question, choice01, choice02, choice03, choice04, correctanswer)
            VALUES ('$quiz_id', '$question', '$choice01', '$choice02', '$choice03', '$choice04', '$correctanswer')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Question has been inserted successfully";
    } else {
        die(mysqli_error($con));
    }
}
?>
<!-- ... (your existing HTML code) ... -->

<!-- ... (your existing HTML code) ... -->

<!-- ... (your existing HTML code) ... -->





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="AddQuestion.css">
    <title>Document</title>
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


<?php

function generateForm($iteration) {
?>

<div class="quiz_box">
    <form action="AddQuestion.php" method="post">
        <input type="hidden" name="iteration" value="<?php echo $iteration; ?>">

        <header>
            <div class="title">Add Question</div>
        </header>

        <div class="form-element">
            <label for="quiz_id">Quiz Id </label><br>
            <input type="text" id="quiz_id_add_question" name="quiz_id" style="width: 100%;" required="required">
        </div>


        
        <div class="form-element">
            <label for="Qstn">Question</label><br>
            <input type="text" id="Qstn_id" name="question" style="width: 100%;" required="required">
        </div>

        <table>

        <tr>
        <td>
          <div class="form-element">
            <label for="choice01">Choice 01</label><br>
            <input type="text" id="quiz_title" name="choice01" style="width: 100%;" required="required"><br>
          </div>
        </td>

        <td>
          <div class="form-element">
            <label for="choice02">Choice 02</label><br>
            <input type="text" id="quiz_description" name="choice02" style="width: 100%;"><br>
          </div>
        </td>
      </tr> <br>

      <tr>
        <td>
          <div class="form-element">
            <label for="choice03">Choice 03</label><br>
            <input type="text" id="quiz_title" name="choice03" style="width: 100%;" required="required"><br>
          </div>
        </td>

        <td>
          <div class="form-element">
            <label for="choice04">Choice 04</label><br>
            <input type="text" id="quiz_description" name="choice04" style="width: 100%;"><br>
          </div>
        </td>
      </tr> <br>
        </table>

        <div class="form-element">
            <label for="answer">Answer</label><br>
            <input type="text" id="answer" name="correctanswer" style="width: 100%;" required="required">
        </div>

        <footer>
            <button type="submit" class="p_btn">Previous</button>
            <button type="submit"  name="s-btn" class="su-btn">Next</button>
            <button type="submit"  name="s-btn" class="su_btn">submit</button>
            

        </footer>
    </form>
</div>

<?php
}

$maxIterations = 3;

for ($iteration = 1; $iteration <= $maxIterations; $iteration++) {
    generateForm($iteration);
}

?>                                                                                                                                                                                                                <script>
        document.getElementById('nextButton').addEventListener('click', function() {
            // Clone the last row in the table
            var lastRow = document.querySelector('#questionTable tr:last-child');
            var newRow = lastRow.cloneNode(true);
        
            // Clear input values in the cloned row
            var inputs = newRow.querySelectorAll('input');
            inputs.forEach(function(input) {
                input.value = '';
            });
        
            // Append the cloned row to the table
            document.getElementById('questionTable').appendChild(newRow);
        });
        </script>
</body>

</html>