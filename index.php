<?php  session_start(); ?>

<!DOCTYPE html>
<html>

<head>
<link rel="shortcut icon" type="png" href="http://localhost/Quizzify/Quizzify/images/icon2.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>Quizzify</title>
	<meta name="desciption" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Interface/css_files/Home.css">
	<link rel="stylesheet" type="text/css" href="Interface/css_files/style.css">
	<link rel="stylesheet" type="text/css" href="Chatbot/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0"/>


	<script>
		$(window).on('scroll', function() {
			if ($(window).scrollTop()) {
				$('nav').addClass('black');
			} else {
				$('nav').removeClass('black');
			}
		})
	</script>
</head>

<body>


	<!-- Navigation Bar -->
	<header id="header">
		<nav>
			<div class="logo"><img src="images/QUIZZIFY.png" alt="logo"></div>
			<ul>
				<li><a class="active" href="Home.php">Home</a></li>
				<li><a href="QuizCreationapi/index.php">Quiz</a></li>
				<li><a href="blog/index.php">Blog</a></li>
				<li><a href="#about_section">About us</a></li>
				<!-- <li><a href="../Interface/contactus.php">Contact Us</a></li> -->
				<li><a href="Interface/team.php">Team</a></li>
				<?php
                    if (isset($_SESSION["id"])) {
                        if ($_SESSION["user_type"] === "dual") {

                    ?>
                            <li><a href="Interface/chooseRole.php">Create/Play</a></li>
                        <?php
                        } elseif ($_SESSION["user_type"] === "participant") {

                        ?>
                            <li><a href="Interface/chooseRole.php">Play</a></li>
                        <?php
                        } elseif ($_SESSION["user_type"] === "instructor") {

                        ?>
                            <li><a href="Interface/chooseRole.php">Create</a></li>
                    <?php
                        }
                    }

                    ?>
			</ul>
			<!-- <div class="srch"><input type="text" class="search" placeholder="Search here..."><img src="../images/icon/search.png" alt="search" onclick=slide()></div> -->
			<?php
            if (isset($_SESSION["id"])) {
                if ($_SESSION["user_type"] === "dual") {

            ?>
                    <a href="Profile/user_profile.php" class="profile"><?php echo $_SESSION["username"]; ?></a>
                <?php
                } elseif ($_SESSION["user_type"] === "participant") {

                ?>
                    <a href="Includes/logout.inc.php" class="profile"><?php echo $_SESSION["username"]; ?></a>
                <?php
                } elseif ($_SESSION["user_type"] === "instructor") {

                ?>
                    <a href="Includes/logout.inc.php" class="profile"><?php echo $_SESSION["username"]; ?></a>
                <?php
                }
            } else {

                ?>
                <a class="get-started" href="Interface/Register.php">Get Started</a>
            <?php
            }
            ?>
			<img src="images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
		</nav>
		<div class="head-container">
			<div class="quote">
				<p>The beautiful thing about learning is that nobody can take it away from you</p>
				<h5>Discover a boundless world of knowledge on our quiz website. Embrace the beauty of learning, for it is an everlasting treasure only you possess. Start your journey today!</h5>
				<div class="play">
					<img src="images/icon/play.png" alt="play"><span><a href="../QuizCreationapi/index.php" target="_blank">Play Now</a></span>
				</div>
			</div>
			<div class="svg-image">
				<img src="images/sample4.png" alt="svg">
			</div>
		</div>
		<div class="side-menu" id="side-menu">
			<div class="close" onclick="sideMenu(1)"><img src="images/icon/close.png" alt=""></div>
			<ul>
			<?php
                    if (isset($_SESSION["id"])) {
                        if ($_SESSION["user_type"] === "dual") {

							?>
							<a href="Profile/user_profile.php" class="profile"><?php echo $_SESSION["username"]; ?></a>
						<?php
						} elseif ($_SESSION["user_type"] === "participant") {
		
						?>
							<a href="Includes/logout.inc.php" class="profile"><?php echo $_SESSION["username"]; ?></a>
						<?php
						} elseif ($_SESSION["user_type"] === "instructor") {
		
						?>
							<a href="Includes/logout.inc.php" class="profile"><?php echo $_SESSION["username"]; ?></a>
						<?php
						}
                    }

                    ?>
                <li><a href="Interface/Home.php">Home</a></li>
                <li><a href="QuizCreation/quiz.php">Quiz</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="#about_section">About us</a></li>
                <!-- <li><a href="../Interface/contactus.php">Contact Us</a></li> -->
                <li><a href="Interface/team.php">Team</a></li>

            </ul>
		</div>
	</header>

	<!-- Some Popular Subjects -->
	<div class="title" id="blog">
		<span>Popular Subjects on Quizzify</span>
	</div>
	<br><br>
	<div class="course">
		<center>
			<div class="cbox">
				<div class="det"><a href="https://www.youtube.com/watch?v=inWWhr5tnEA"><img src="images/courses/book.png">Cybersecurity</a></div>
				<div class="det"><a href="https://www.youtube.com/watch?v=ukzFI9rgwfU"><img src="images/courses/d1.png">Machine Learning</a></div>
				<div class="det"><a href="https://www.youtube.com/watch?v=mo1lNRKnayA"><img src="images/courses/paper.png">5G Technology</a></div>
				<div class="det"><a href="https://www.youtube.com/watch?v=RrTCjp2015M"><img src="images/courses/d1.png">Biotechnology</a></div>
			</div>
		</center>
		<div class="cbox">
			<div class="det"><a href="https://www.youtube.com/@freecodecamp/playlists"><img src="images/courses/computer.png">Courses</a></div>
			<div class="det"><a href="https://www.youtube.com/watch?v=BBpAmxU_NQo"><img src="images/courses/data.png">Data Structures</a></div>
			<div class="det"><a href="https://www.youtube.com/watch?v=htjRUL3neMg"><img src="images/courses/algo.png">Robotics</a></div>
			<div class="det det-last"><a href="https://www.youtube.com/watch?v=xowQkxFXTNg"><img src="images/courses/projects.png">Automation</a></div>
		</div>
	</div>


	<!-- ABOUT -->
	<div class="diffSection" id="about_section">
		<center>
			<p style="font-size: 50px; padding: 100px">About Us</p>
		</center>
		<div class="about-content">
			<div class="side-image">
				<img class="sideImage" src="images/sample3.png">
			</div>
			<div class="side-text">
				<h2>What you think about us ?</h2>
				<p>Education is the process of facilitating learning, or the acquisition of knowledge, skills, values, beliefs, and habits. Educational methods include teaching, training, storytelling, discussion and directed research.<br> Educational website can include websites that have games, videos or topic related resources that act as tools to enhance learning and supplement classroom teaching. These websites help make the process of learning entertaining and attractive to the student, especially in today's age.</p>
			</div>
		</div>
	</div>


	<!-- Team -->


	<!-- Contact us -->
	

	<!-- Sliding Information -->
	<marquee style="background: linear-gradient(to right, #4AA017, #b3f58d); margin-top: 50px;" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="20">
		<div class="marqu">“Education is the passport to the future, for tomorrow belongs to those who prepare for it today.” “Your attitude, not your aptitude, will determine your altitude.” “If you think education is expensive, try ignorance.” “The only person who is educated is the one who has learned how to learn …and change.”</div>
	</marquee>

	<!-- FOOTER -->
	<footer>
		<div class="footer-container">
			<div class="left-col">
				

				<p class="rights-text">Copyright © 2023 Created By UWU TEAM, All Rights Reserved.</p>
				<br>
				<p><img src="images/icon/location.png"> Passara Road, Badulla</p><br>
				<p><img src="images/icon/phone.png"> 055-222-4446<br>
				<p><img src="images/icon/mail.png"> Quizzify2023@gmail.com
				<!-- <p><img src="../../images/icon/mail.png">&nbsp; </p> -->
			</div>
			<div class="right-col">
			<img src="images/QUIZZIFY.png" style="width: 200px;">
				<div class="logo"></div>
			</div>
		</div>
	</footer>

	
</body>
	<script type="text/javascript" src="Chatbot/script.js"></script>
	<script type="text/javascript" src="Interface/Home.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</html>