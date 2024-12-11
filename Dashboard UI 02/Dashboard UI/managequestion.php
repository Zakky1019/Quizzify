<?php

include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="manageQuiz.css">
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



    <div class="table_responsive">
        <table>
            <thead>
                <tr>
                    <th>Quiz Id</th>
                    <th>Question Id</th>
                    <th>Question</th>
                    <th>Choice 01</th>
                    <th>Choice 02</th>
                    <th>Choice 03</th>
                    <th>Choice 04</th>
                    <th>Answer</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

            <?php

$sql="Select * from question  ";
$result=mysqli_query($con,$sql);
if($result) {
    while($row=mysqli_fetch_assoc($result)) {
        $question_id=$row['question_id'];
        $quiz_id=$row['quiz_id'];
        $question=$row['question'];
        $choice01=$row['choice01'];
        $choice02=$row['choice02'];
        $choice03=$row['choice03'];
        $choice04=$row['choice04'];
        $correctanswer=$row['correctanswer'];

        echo '<tr>
        <td>'.$question_id.'</td>
        <td>'.$quiz_id.'</td>
        <td>'.$question.'</td>
        <td>'.$choice01.'</td>
        <td>'.$choice02.'</td>
        <td>'.$choice03.'</td>
        <td>'.$choice04.'</td>
        <td>'.$correctanswer.'</td>

        <td>
            <span class="action_btn">
                <a href="updateQuestion.php?updateid='.$question_id.'">Edit</a>
                <a href="deleteQuiz.php?deleteid='.$question_id.'">Delete</a>
                
            </span>
        </td>
        
        </tr>';
    }
}

            ?>

            
            

            </tbody>
        </table>
    </div>

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

</body>

</html>