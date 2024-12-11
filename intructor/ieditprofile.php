<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["id"])) {
    // Redirect to the login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Continue with your code for the edit profile page...
// You can access user information using $_SESSION["id"]
$userID = $_SESSION["id"];
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Profile</title>
        <style>
            /* CSS styles for edit profile page */
            body {
                background: #FFFFE0;
                font-family: 'Open Sans', sans-serif;
                margin: 0;
                padding: 0;
                font-size: 20px;
                color: #2e2e2e;
                background:  url('http://localhost/Quizzify/Quizzify/images/bg1.jpg') ;                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            nav {
            padding-top: 0px;
            padding-bottom: 0px;
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
            .edit-profile-container {
            max-width: 700px;
           margin-left: 300px;
            padding: 10px;
           
            border: 0px solid greenyellow;
            margin-top: 150px;
            background: rgba(255, 255, 255, 0.8); 
           padding-top: 50px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0);

        border-radius: 5px;

    }

            .edit-profile-form {
                
                display: flex;
                flex-direction: column;
            }

            .edit-profile-form label {
                margin-bottom: 10px;
            }

            .edit-profile-form input[type="text"],
            .edit-profile-form input[type="email"] {
                width: 90%;
                padding: 8px 8px;   
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .edit-profile-form input[type="file"] {
                margin-bottom: 15px;
            }

            .edit-profile-form button {
                width: 100%;
                padding: 10px 50px;
                cursor: pointer;
                display: block;
                margin-top: 10px;
                background: linear-gradient(to right,  #4AA017, #b3f58d);
                border: 0;
                outline: none;
                border-radius: 30px;
                transition: background-color 0.3s ease; /* Add a smooth transition effect */
                color: white; /* Text color */
                font-weight: bold; /* Bold text */
            }

            /* CSS for the hover effect */
            .edit-profile-form button:hover {
                background: linear-gradient(to right,  #b3f58d, #4AA017); /* Change the background color on hover */
            }

            /* Style for the return button */
            .return-button {
                text-align: center;
            margin-top: 10px;
            transition: background-color 0.3s ease; /* Add a smooth transition effect */
            
            }

            .return-button a {
                display: inline-block;
            padding: 7px 40px;
            background: linear-gradient(to right, #4aa017, #b3f58d);
            border: 0;
            outline: none;
            border-radius: 30px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease; /* Add a smooth transition effect */
            }

            .return-button a :hover {
                background: linear-gradient(to right, #b3f58d, #4aa017);
            }
        </style>
        </head>
    <body>
        <header id="header">
            <nav>
                <div class="logo"><img src="http://localhost/Quizzify/Quizzify/images/QUIZZIFY.png" alt="logo"></div>
                <ul>
                    <li><a class="active" href="">Home</a></li>
                    <li><a href="http://localhost/Quizzify/Quizzify/QuizCreation/quiz.php">Quiz</a></li>
                    <li><a href="http://localhost/Quizzify/Quizzify/Chatbot/index.php">chatbot</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="#about_section">About us</a></li>
                    <li><a href="#team_section">Team</a></li>
                </ul>


        </header>
    <div class="edit-profile-container" style="padding-top: 50px;">
        <h2>Edit Profile</h2>
        <form class="edit-profile-form" action="idisplay_profile_picture.php" method="post" enctype="multipart/form-data">
            <!-- Include the User_Id in a hidden input field -->
            <input type="hidden" name="Instrcutor_Id" value="<?php echo isset($userID) ? $userID : ''; ?>">
            
            <!-- Input field for the new username -->
            <label for="new_username">New Username:</label>
            <div class="availability-message" id="availability-message"></div>

            <input type="text" id="new_username" name="new_username"  onblur="checkUsernameAvailability()">
            
            <!-- Input field for the profile picture (you can handle this separately) -->
            <label for="new_avatar">New Profile Picture:</label>
    <input type="file" id="new_avatar" name="new_avatar" accept="image/*">
            
            <!-- Submit button to save changes -->
            <button type="submit" onclick="return validateForm()">Save Changes</button>        </form>

        <!-- Return to User Profile button -->
        <div class="return-button">
        <a href="iuser_profile.php">Return to User Profile</a>
    </div>
    </div>
</body>
<script>
function checkUsernameAvailability() {
    var newUsername = document.getElementById("new_username").value;
    var availabilityMessage = document.getElementById("availability-message");

    // Perform an AJAX request to check username availability
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "check_username.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;

            if (response.includes("already taken")) {
                // Username is already taken, ask if the user wants to change it
                if (confirm("Username is already taken. Do you want to change it?")) {
                    var newUsername = prompt("Enter a new username:");
                    if (newUsername) {
                        // The user entered a new username, update the input field
                        document.getElementById("new_username").value = newUsername;
                    }
                }
            } else {
                // Username is available, show a confirmation message
                alert("Username is available and will be changed upon saving.");
            }

            // Update the availability message div with the response
            availabilityMessage.innerHTML = response;
        }
    };
    xhr.send("new_username=" + newUsername);
}
function validateForm() {
    const newUsername = document.getElementById("new_username").value;
    const newAvatar = document.getElementById("new_avatar").value;

    // Check if both new username and new avatar are empty
    if (newUsername.trim() === "" && newAvatar === "") {
        alert("Please enter a new username or upload a new profile picture.");
        return false; // Prevent form submission
    }

    // At least one field is filled, so it's okay to submit the form
    return true;
}
</script>
    </html>