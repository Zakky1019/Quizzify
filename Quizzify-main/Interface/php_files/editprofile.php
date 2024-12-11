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
    <link rel="shortcut icon" type="png" href="http://localhost/Quizzify/Quizzify/images/icon2.png">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Profile</title>
        <style>
            /* CSS styles for edit profile page */
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                font-size: 20px;
                color: #2e2e2e;
                background-image: url('img/bg1.jpg'); /* Replace 'your-background-image.jpg' with the actual path to your image */
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }

            .edit-profile-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 0px solid greenyellow;
            margin-top: 100px;
            background: rgba(255, 255, 255, 0.8); 
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);

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
                width: 100%;
                padding: 8px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .edit-profile-form input[type="file"] {
                margin-bottom: 15px;
            }

            .edit-profile-form button {
                width: 100%;
                padding: 10px 30px;
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
                margin-top: 10px;
                text-align: center;
            }

            .return-button a {
                display: inline-block;
                padding: 10px 5px;
                background: linear-gradient(to right, #4aa017, #b3f58d);
                border: 0;
                outline: none;
                border-radius: 10px;
                color: white;
                text-decoration: none;
                font-weight: bold;
            }

            .return-button a :hover {
                background: linear-gradient(to right, #b3f58d, #4aa017);
            }
        </style>
        </head>
    <body>
    <div class="edit-profile-container">
        <h2>Edit Profile</h2>
        <form class="edit-profile-form" action="update_profile.php" method="post">
            <!-- Include the User_Id in a hidden input field -->
            <input type="hidden" name="User_Id" value="<?php echo isset($userID) ? $userID : ''; ?>">
            
            <!-- Input field for the new username -->
            <label for="new_username">New Username:</label>
            <div class="availability-message" id="availability-message"></div>

            <input type="text" id="new_username" name="new_username" required onblur="checkUsernameAvailability()">
            
            <!-- Input field for the profile picture (you can handle this separately) -->
            <label for="avatar">Profile Picture:</label>
            <input type="file" id="avatar" name="avatar">
            
            <!-- Submit button to save changes -->
            <button type="submit">Save Changes</button>
        </form>
        
        <!-- Return to User Profile button -->
        <div class="return-button">
            <button onclick="window.location.href = 'user_profile.php?User_Id=<?php echo isset($userID) ? $userID : ''; ?>'">
                Return to User Profile
            </button>
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

</script>
    </html>