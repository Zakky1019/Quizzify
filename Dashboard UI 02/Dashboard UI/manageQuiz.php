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

<!-- Manage Quiz -->

    <div class="table_responsive">
        <table>
            <thead>
                <tr>
                    <th>Quiz Id</th>
                    <th>Quiz Title</th>
                    <th>Quiz description</th>
                    <th>Quiz time limit</th>
                    <th>Question Limit</th>
                    <th>Quiz Passcode</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

            <?php

            $sql="Select * from quiz ";
            $result=mysqli_query($con,$sql);
            if($result) {
                while($row=mysqli_fetch_assoc($result)) {
                    $quiz_id=$row['quiz_id'];
                    $quiz_title=$row['quiz_title'];
                    $quiz_description=$row['quiz_description'];
                    $quiz_time=$row['quiz_timelimit'];
                    $question_limit=$row['que_limit'];
                    $quiz_passcode=$row['quiz_passcode'];

                    echo '<tr>
                    <td>'.$quiz_id.'</td>
                    <td>'.$quiz_title.'</td>
                    <td>'.$quiz_description.'</td>
                    <td>'.$quiz_time.'</td>
                    <td>'.$question_limit.'</td>
                    <td>'.$quiz_passcode.'</td>
                    <td>
                        <span class="action_btn">
                            <a href="updateQuiz.php?updateid='.$quiz_id.'">Edit</a>
                            <a href="deleteQuiz.php?deleteid='.$quiz_id.'">Delete</a>
                            <a href="managequestion.php">view questions</a>
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