<?php
session_start();

if (!isset($_SESSION["id"])) {
    // Redirect to the login page or handle the case when the user is not logged in.
    header("Location: quizzify\Quizzify\Quizzify\Interface\php_files/registration.php"); // Replace "login.php" with your actual login page URL.
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
$query = "SELECT username, first_name, last_name, Email FROM user WHERE User_Id = :id";
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
<link rel="shortcut icon" type="png" href="http://localhost/Quizzify/Quizzify/images/icon2.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  
  <style>
    /* CSS styles for user profile page */
    body {
      background: #FFFFE0;
      font-family: 'Open Sans', sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('http://localhost/Quizzify/Quizzify/images/userBg.jpg'); /* Replace 'your-background-image.jpg' with the actual path to your image */
      background-size: cover;   
      background-repeat: no-repeat;
      background-attachment: fixed;
      color: white;
    }

    main.profile-container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 10px;
      display: flex; /* Add display flex to main container */
      background: rgba(255, 255, 255, 0.8); 
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    section.user-details {
      flex: 1; /* Set user details section to take up 1/3 of the available space */
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      border-right-width: 1px solid greenyellow;
      margin-right: 50px;
    }

    .left-section {
      text-align: center;
    }

    .left-section img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
    }

    .middle-section {
      padding: 0 20px;
    }

    .right-section {
      flex: 1; /* Set quiz reviews section to take up 2/3 of the available space */
      text-align: center;
    }

    .right-section button {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-bottom: 10px;
      transition: background-color 0.3s ease; /* Add a smooth transition effect */
    }

    .right-section button:hover {
      background-color: #4AA017; /* Change the background color on hover */
    }

    .quiz-review {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 10px;
      border-right-width:  1px solid greenyellow;
    }
    h2{
        font-size: 40px;
        color: #4AA017;
    }
    p{
        font-size: 15px;
        color: #2e2e2e;
    }
    h3{
        font-size: 20px;
        color: #2e2e2e;
    }
    .edit-btn,.change-pwd-btn{
        width: 85%;
        padding: 10px 30px;
        cursor: pointer;
        display: block;
        margin: auto;
        background: linear-gradient(to right,  #4AA017, #b3f58d);
        border: 0;
        outline: none;
        border-radius: 30px;
        transition: background-color 0.3s ease; /* Add a smooth transition effect */
    }
    .edit-btn:hover, .change-pwd-btn:hover,.review-btn:hover {
        background: linear-gradient(to right,  #b3f58d, #4AA017); /* Change the background color on hover */
    }
    .review-btn{
        width: 85%;
        padding: 10px 30px;
        cursor: pointer;
        display: block;
        margin: auto;
        background: linear-gradient(to right,  #4AA017, #b3f58d);
        border: 0;
        outline: none;
        border-radius: 30px;
        transition: background-color 0.3s ease; /* Add a smooth transition effect */
    }
  </style>
</head>
<body>
  <main class="profile-container">
    <section class="user-details">
      <div class="left-section">
        <img src="http://localhost/Quizzify/Quizzify/images/userDp.png" alt=""/>
      </div>
      <div class="middle-section">
    <h2 style="color: #4AA017; text-align: center;"><?php echo $userDetails['username']; ?></h2>
   <center>
    <p><label for="" style="color: dark grey; font-weight: bolder;">First Name:</label> <?php echo $userDetails['first_name']; ?></p>
    <p><label for="" style="color: dark grey; font-weight: bolder;">Last Name:</label> <?php echo $userDetails['last_name']; ?></p>
    <p><label for="" style="color: dark grey; font-weight: bolder;">Email:</label> <?php echo $userDetails['Email']; ?></p>
    <!-- <p>Member since: January 2023</p> -->
    </center>
</div>


        
        
        <!-- Other user details can be added here -->
      </div>
      <div class="right-section">
        <button class="edit-btn" onclick="window.location.href = 'editprofile.php'">Edit Profile</button>

        
          <button class="change-pwd-btn" onclick= "redirect2()">Change Password</button>
          <br>
          <button class="review-btn" onclick="window.location.href='http://localhost/Quizzify/Quizzify/Includes/logout.inc.php'" style="border-radius: 25px;">Logout</button>
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
      <!-- Add more quiz reviews dynamically if available -->
    </section>
  </main>

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
