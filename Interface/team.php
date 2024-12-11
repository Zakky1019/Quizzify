<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="png" href="http://localhost/Quizzify/Quizzify/images/icon2.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team</title>

    <link rel="stylesheet" href="../Interface/css_files/navFoot.css">
    <script type="text/javascript" src="Home.js"></script>


    <style>
        
/*TEAM SECTION*/
.totalcard {
	width: 100%;
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	justify-content: center;
	margin-bottom: 50px;
}

.totalcard .card {
	margin: 50px;
	width: 300px;
	border-radius: 10px;
	background: #fff;

	text-align: center;
}

.totalcard .card {
	box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.4),
		0 0 10px rgba(0, 0, 0, 0.3);
}

.card:nth-child(1) {
	border-top: 5px solid green;
}

.card:nth-child(2) {
	border-top: 5px solid green;
}

.card:nth-child(1):hover {
	box-shadow: inset 0px 0px 10px rgba(0, 255, 0, 0.5),
		1px 1px 30px rgba(0, 255, 0, 0.5);
}

.card:nth-child(2):hover {
	box-shadow: inset 0px 0px 10px rgba(0, 255, 0, 0.5),
		1px 1px 30px rgba(0, 255, 0, 0.5);
}

.totalcard .card img {
	width: 100px;
	height: 100px;
	margin-top: 5px;
	cursor: pointer;
	border-radius: 50px;
	transition-duration: .8s;
}

.totalcard .card img:hover {
	transform: scale(3.5);
	border-radius: 0;
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
}

#detail p {
	font-size: 15px;
	line-height: 25px;
	font-variant: small-caps;
	text-align: center;
	margin: 25px;
	margin-bottom: 0px;
	margin-top: 0px;
	
}

#detail {
  display: flex;
  flex-direction: column;
  align-items: center;
}

#detail button {
	outline: none;
	border-radius: 10px;
	border-style: none;
	border: 1px solid black;
	padding: 9px 25px;
	cursor: pointer;
	transition-duration: .4s;
}

#detail a {
	bottom: 80px;
	text-decoration: none;
	margin-bottom: 30px;
	margin-top: 20px;
	margin-left: 90px;
	align-self: center;
}

.btn-sanoj:hover {
	background: rgba(15, 128, 15, 0.7);
	color: #fff;
}


.btn-name:hover {
	background:  rgba(15, 128, 15, 0.7);
	color: #fff;
}

.card-title {
	font-size: 17px;
	color: #343A40;
	padding: 20px;
	font-weight: 700;
}

    </style>

</head>


<body>

    <!-- Navigation Bar -->
    <header id="header">
        <nav>
            <div class="logo"><img src="../images/QUIZZIFY.png" alt="logo"></div>
            <ul>
                <li><a href="../Interface/Home.php">Home</a></li>
                <li><a href="../../QuizCreationapi/index.php">Quiz</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="#about_section">About us</a></li>
                <li><a href="../Interface/contactus.php">Contact Us</a></li>
                <li><a href="#team_section">Team</a></li>
            </ul>
            <!-- <div class="srch"><input type="text" class="search" placeholder="Search here..."><img src="../images/icon/search.png" alt="search" onclick=slide()></div> -->
            <a class="get-started" href="Register.php">Get Started</a>
            <img src="./images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
        </nav>

        <div class="side-menu" id="side-menu">
            <div class="close" onclick="sideMenu(1)"><img src="../images/icon/close.png" alt=""></div>

            <ul>
                <li><a href="../Interface/Home.php">Home</a></li>
                <li><a href="../../QuizCreation/quiz.php">Quiz</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="#about_section">About us</a></li>
                <li><a href="../Interface/contactus.php">Contact Us</a></li>
                <li><a href="#team_section">Team</a></li>

            </ul>
        </div>
    </header>
    <!-- nav end -->

    <!-- TEAM -->
	<div class="diffSection" id="team_section">
		<center>
			<p style="font-size: 50px; padding-top: 100px; padding-bottom: 60px; "><b>WE ARE THE CREATORS</b></p>
		</center>
		<div class="totalcard">
			<div class="card">
				<center><img src="../images/creator/Sanoj.jpg"></center>
				<center>
					<div class="card-title">Sanoj Ahamed</div>
					<div id="detail">
						<p>“ You can teach a student a lesson for a day; but if you can teach him to learn by creating curiosity, he will continue the learning process as long as he lives “</p>
						<div class="duty"></div>
						<a href="https://www.linkedin.com/in/sanoj-ahamed/" target="_blank"><button class="btn-sanoj">Follow +</button></a>
					</div>
				</center>
			</div>
			<div class="card">
				<center><img src="../images/creator/samir.jpeg"></center>
				<center>
					<div class="card-title">Samir Hussain</div>
					<div id="detail">
						<p>“ Real education should consist of drawing the goodness and the best out of our own students. What better books can there be than the book of humanity “</p>
						<div class="duty"></div>
						<a href="#" target="_blank"><button class="btn-name">Follow +</button></a>
					</div>
				</center>
			</div>

			<div class="card">
				<center><img src="../images/creator/userDp.png"></center>
				<center>
					<div class="card-title">Aysha Cader</div>
					<div id="detail">
						<p>“ Real education should consist of drawing the goodness and the best out of our own students. What better books can there be than the book of humanity “</p>
						<div class="duty"></div>
						<a href="#" target="_blank"><button class="btn-name">Follow +</button></a>
					</div>
				</center>
			</div>
			<div class="card">
				<center><img src="../images/creator/userDp.png"></center>
				<center>
					<div class="card-title">Fathima Sumra </div>
					<div id="detail">
						<p>“ Real education should consist of drawing the goodness and the best out of our own students. What better books can there be than the book of humanity “</p>
						<div class="duty"></div>
						<a href="#" target="_blank"><button class="btn-name">Follow +</button></a>
					</div>
				</center>
			</div>
			<div class="card">
				<center><img src="../images/creator/userDp.png"></center>
				<center>
					<div class="card-title">Mohammed Zakky</div>
					<div id="detail">
						<p>“ Real education should consist of drawing the goodness and the best out of our own students. What better books can there be than the book of humanity “</p>
						<div class="duty"></div>
						<a href="#" target="_blank"><button class="btn-name">Follow +</button></a>
					</div>
				</center>
			</div>
			<div class="card">
				<center><img src="../images/creator/userDp.png"></center>
				<center>
					<div class="card-title">Mohammed Aqeel</div>
					<div id="detail">
						<p>“ Real education should consist of drawing the goodness and the best out of our own students. What better books can there be than the book of humanity “</p>
						<div class="duty"></div>
						<a href="#" target="_blank"><button class="btn-name">Follow +</button></a>
					</div>
				</center>
			</div>
		</div>
	</div>

    <!-- FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="left-col">
                <img src="../images/QUIZZIFY.png" style="width: 200px;">
                <div class="logo"></div>
                <br>
                <p class="rights-text">Copyright © 2023 Created By UWU TEAM, All Rights Reserved.</p>
                <br>
                <p><img src="../images/icon/location.png"> Passara Road, Badulla</p><br>
                <p><img src="../images/icon/phone.png"> 055-222-4446</p><br>
                <p><img src="../images/icon/mail.png"> Quizzify2023@gmail.com
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

    <!-- footer ends -->

</body>

</html>

<?php
