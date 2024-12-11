    <?php
    session_start();



    if (!isset($_SESSION["id"])) {
        // Redirect to the login page or handle the case when the user is not logged in.
        header("Location: login.php"); // Replace "login.php" with your actual login page URL.
        exit();
    }

    require_once 'DbConnector.php'; // Include the DbConnector class file.

    $dbConnector = new \classes\DbConnector();
    $con = $dbConnector->establishConnection();

    if (!$con) {
        // Handle database connection error.
        die("Database connection failed");
    }

    $userID = $_SESSION["id"];

    // Fetch user details from the database.
    $query = "SELECT Username, FirstName, LastName,DUser_Id,Email,profile_picture FROM dualuser WHERE DUser_Id = :id";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':id', $userID);
    $stmt->execute();
    $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$userDetails) {
        // Handle the case when user details are not found.
        die("User not found");
    }

    // Close the database connection.
    $con = null;
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>User Profile</title>

      <style>
        /* CSS styles for user profile page */
        @import url('https://fonts.googleapis.com/css?family=Montserrat:500&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Dancing+Script&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
    }

    html {
            scroll-behavior: smooth;
    }

    body {
            background: #FFF;
            font-family: 'Open Sans', sans-serif;
    }
    leftsection.img{
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
    nav {
            padding-top: 20px;
            padding-bottom: 20px;
            top: 0;
            position: fixed;
            display: flex;
            width: 100%;
            z-index: 1000;
            background: #fff;
            justify-content: space-around;
            transition: 1.5s;
            align-items: center;
    }

    nav ul {
            display: flex;
            align-items: center;
    }

    nav ul li {
            list-style: none;
            margin: 5px 10px;
    }

    nav ul li a {
            padding: 2px 10px;
            color: #2e2e2e;
            cursor: pointer;
            transition: .5s;
            text-decoration: none;
            padding-left: 30px;
            padding-right: 30px;
    }

    nav ul li a:hover {
            border-bottom: solid #4AA017;
    }

    .active {
            color: #fff;
            border-radius: 5px;
            background: #4AA017;
            width: 100px;
            height: 35px;
            padding-top: 15px;
            padding-bottom: 25px;
    }

   

    .get-started {
            margin-left: 50px;
            padding: 5px 20px;
            border: 2px solid #4AA017;
            border-radius: 30px;
            text-decoration: none;
            width: 150px;
            height: 40px;
            padding-top: 10px;
            transition: .5s;
            background-color: #4AA017;
            color: #fff;
    }

    .get-started:hover {
            color: #2e2e2e;
            background: #fff;
    }

    .logo img {
            width: 120px;
            cursor: pointer;
            transition: 1s;
    }

    a,
    button {
            float: left;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            font-size: 15px;
            color: #2E3D49;
            display: block;
            text-decoration: none;
            text-align: center;
    }


        body {
          background: #FFFFE0;
          font-family: 'Open Sans', sans-serif;
          margin: 0;
          padding: 0;
          background:  url('http://localhost/Quizzify/Quizzify/images/bg1.jpg') ;   
          background-size: cover;   
          background-repeat: no-repeat;
          background-attachment: fixed;
          color: white;

        }

        main.profile-container {
            word-wrap: break-word;
          max-width: 2000px;
          margin: 0 auto;
          padding: 10px;
          display: flex; /* Add display flex to main container */

            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0);

        border-radius: 5px;

        }

    section.user-details {
        
        word-wrap: break-word;
            display:1;
          flex: 1/3; /* Set user details section to take up 1/3 of the available space */
          border: 1px solid #ccc;
          border-radius: 5px;
          padding: 10px;
          
        box-shadow: 0px 0px 10px rgba(0, 0, 0, .2);
          background: rgba(255, 255, 255, 1);
          margin-right: 20px;
          
      
    }

        .left-section {
            
            flex:1;
          text-align: center;
          padding: 75px;

        }

        .left-section img {
          width: 150px;
          height: 150px;
          border-radius: 50%;
          background: rgba(255, 255, 255, 0.1); /* Use rgba to set the background color with some transparency */
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0);
        }

        .middle-section {
            font-size:  15px;
          padding: 0 20px;
          flex: 1;
        }

        .right-section {
      flex: 2;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      background: rgba(255, 255, 255, 0.1); /* Use rgba to set the background color with some transparency */
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0); /* Adjust the alpha channel for a translucent shadow */
      border-radius: 5px;
    }

    .right-section button {
        width: 80%; /* Adjust button width */
        padding:10px 10px;
        cursor: pointer;
        margin-top:10px;
        margin-bottom: 10px;
        transition: background-color 0.3s ease;
        width: 100%; /* Button width set to 100% of the container */
        font-size: 15px;
    }

        .right-section button:hover {
          background-color: #4AA017; /* Change the background color on hover */
        }


        h2{
            font-size: 35px;
            color: #4AA017;
             margin-bottom: 10px;
        }
        p{
            font-size: 15px;
            color: #2e2e2e;
             margin-bottom: 10px;
        }
        h3{
            font-size: 20px;
            color: #2e2e2e;
            margin-bottom: 10px;
        }
        .edit-btn,.change-pwd-btn{
            width: 85%;
            padding: 15px 10px;
            cursor: pointer;
            display: block;
            margin: auto;
            background: linear-gradient(to right,  #4AA017, #b3f58d);
            border: 0;
            outline: none;
            border-radius: 30px;
            transition: background-color 0.3s ease; /* Add a smooth transition effect */
            font-size: 10;
        }
        .edit-btn:hover, .change-pwd-btn:hover,.review-btn:hover {
            background: linear-gradient(to right,  #b3f58d, #4AA017); /* Change the background color on hover */
        }
        .quiz-reviews {
        width: 2000px;
        margin: 0 auto;
        padding: 20px;
        background: rgba(255, 255, 255, 1);
        box-shadow: 0px 0px 10px rgba(0, 0, 0, .2);
        border: 1px solid #ccc; 
        border-radius: 5px;
        margin-top: 0px; /* Spacing added between user details and quiz reviews */
        overflow: auto;
        max-height: 700px;
        
      }

      .quiz-review {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 50px;
        margin-bottom: 10px;

      }

      .quiz-review h3 {
        font-size: 25px;
        color: #2e2e2e;
        margin-bottom: 10px;
      }

      .quiz-review p {
        font-size: 15px;
        color: #2e2e2e;
        margin-bottom: 15px;
      }

      .review-btn {
        width: 100%;
        padding: 10px 20px;
        cursor: pointer;
        display: block;
        margin: auto;
        background: linear-gradient(to right, #4AA017, #b3f58d);
        border: 0;
        outline: none;
        border-radius: 30px;
        transition: background-color 0.3s ease;
        text-align: center;
        color: white;
        font-size: 16px;
      }

      .review-btn:hover {
        background: linear-gradient(to right, #b3f58d, #4AA017);
      }
      
      footer {
	color: #E5E8EF;
	background: #000D;
	padding: 50px 0;
}

footer .footer-container {
	max-width: 1300px;
	margin: auto;
	padding: 0 20px;
	display: flex;
	justify-content: space-between;
	align-items: center;
	flex-wrap: wrap-reverse;
}

footer .social-media img {
	width: 22px;
}

footer .logo {
	width: 180px;
	color: #fff;
}

footer .social-media a {
	margin-right: 10px;
	font-size: 22px;
	text-decoration: none;
}

footer .right-col h1 {
	font-size: 26px;
}
footer .left-col p {
	font-size: 15px;
        color:#FFF;
}
footer .border {
	width: 100px;
	height: 4px;
	background: linear-gradient(to right, #4AA017, #b3f58d);
	margin: 2px;
}

footer .newsletter-form {
	display: flex;
	justify-content: center;
	align-items: center;
	flex-wrap: wrap;
}

footer input::placeholder {
	color: white !important;
}

footer .txtb {
	flex: 1;
	padding: 18px 40px;
	font-size: 16px;
	background: #343A40;
	border: none;
	font-weight: 700;
	outline: none;
	border-radius: 5px;
	min-width: 260px;
	margin-top: 20px;
	color: white;
}

footer .btn {
	margin-top: 20px;
	padding: 18px 40px;
	font-size: 16px;
	color: #f1f1f1;
	background: linear-gradient(to right, #4AA017, #b3f58d);
	border: none;
	font-weight: 700;
	outline: none;
	border-radius: 5px;
	margin-left: 20px;
	cursor: pointer;
	transition: opacity .3s linear;
}

footer .btn:hover {
	opacity: .7;
}

/* get started button */
.get-started {
	margin-left: 50px;
	padding: 5px 20px;
	border: 2px solid #4AA017;
	border-radius: 30px;
	text-decoration: none;
	width: 150px;
	height: 40px;
	padding-top: 10px;
	transition: .5s;
	background-color: #4AA017;
	color: #fff;
	text-align: center;
}

.get-started:hover {
	color: #2e2e2e;
	background: #fff;
}


      </style>
    </head>
    <body>
        <header id="header">
        <nav>
			<div class="logo"><img src="../images/QUIZZIFY.png" alt="logo"></div>
			<ul>
				<li><a class="active" href="../Interface/Home.php">Home</a></li>
				<li><a href="../../QuizCreationapi/index.php">Quiz</a></li>
				<li><a href="blog.php">Blog</a></li>
				<li><a href="#about_section">About us</a></li>
				<li><a href="../Interface/contactus.php">Contact Us</a></li>
				<li><a href="../Interface/team.php">Team</a></li>
				<?php
                    if (isset($_SESSION["id"])) {
                        if ($_SESSION["user_type"] === "dual") {

                    ?>
                            <li><a href="../Interface/chooseRole.php">Create/Play</a></li>
                        <?php
                        } elseif ($_SESSION["user_type"] === "participant") {

                        ?>
                            <li><a href="../Interface/chooseRole.php">Play</a></li>
                        <?php
                        } elseif ($_SESSION["user_type"] === "instructor") {

                        ?>
                            <li><a href="../Interface/chooseRole.php">Create</a></li>
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
                    <a href="../Profile/user_profile.php" class="profile" class="get-started">Profile</a>
                <?php
                } elseif ($_SESSION["user_type"] === "participant") {

                ?>
                    <a href="../participantprofile/participantprofile.php" class="get-started">Profile</a>
                <?php
                } elseif ($_SESSION["user_type"] === "instructor") {

                ?>
                    <a href="../intructor/iuser_profile.php" class="get-started">Profile</a>
                <?php
                }
            } else {

                ?>
                <a class="get-started" href="../Interface/Register.php">Get Started</a>
            <?php
            }
            ?>
			<!-- <img src="../images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu"> -->
		</nav>

        </header>
      <main class="profile-container" style="padding-top: 150px;">
        <section class="user-details">
            <div class="left-section">
                <img src="display_profile_picture.php" alt="Profile Picture">
            </div>
          <div class="middle-section">
        <h2><?php echo $userDetails['Username']; ?></h2>
            
        <p>User ID: <?php echo $userDetails['DUser_Id']; ?></p>
        <p>First Name: <?php echo $userDetails['FirstName']; ?></p>
        <p>Last Name: <?php echo $userDetails['LastName']; ?></p>
        <p>Email: <?php echo $userDetails['Email']; ?></p>
        

    </div>



                
          </div>
          <div class="right-section">
            <button class="edit-btn" onclick="window.location.href = 'editprofile.php'">Edit Profile</button>


              <button class="change-pwd-btn" onclick= "window.location.href = '../Interface/ForgotPwd.php'">Change Password</button>
              <br>
              <button class="review-btn" onclick="window.location.href='../Includes/logout.inc.php'" style="border-radius: 25px;">Logout</button>
            </a>
          </div>
        </section>

        <section class="quiz-reviews">
          <h2>Quiz Reviews</h2>
          <div class="quiz-review">
            <h3>Quiz Title 1</h3>
            <p>Score: 9/10</p>
            <p>Review: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <button class="review-btn" onclick="window.location.href='review_page.html'">Review</button>
          </div>
          <div class="quiz-review">
            <h3>Quiz Title 2</h3>
            <p>Score: 7/10</p>
            <p>Review: Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            <button class="review-btn" onclick="window.location.href='review_page.html'">Review</button>
          </div>
          <div class="quiz-review">
            <h3>Quiz Title 2</h3>
            <p>Score: 7/10</p>
            <p>Review: Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            <button class="review-btn" onclick="window.location.href='review_page.html'">Review</button>
          </div>
          <div class="quiz-review">
            <h3>Quiz Title 2</h3>
            <p>Score: 7/10</p>
            <p>Review: Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            <button class="review-btn" onclick="window.location.href='review_page.html'">Review</button>
          </div>
          <!-- Add more quiz reviews dynamically if available -->
        </section>

      </main>
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


      <script>
        function redirect1() {
                 window.location.href = 'http://localhost/Quizzify/php_files/editprofile.php';
            }

            function redirect2() {
                window.location.href = 'http://localhost/Quizzify/Quizzify/ui/change_psw.php';
            }
      </script>
    </body>
    </html>
