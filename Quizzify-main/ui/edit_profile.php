    <?php
    session_start(); // Start a session

    // Retrieve User_Id from the session (if it exists)
    if (isset($_SESSION['User_Id'])) {
        $mm = $_SESSION['User_Id'];
    } else {
        // Handle the case where User_Id is not set in the session (e.g., redirect to a login page)
        header('Location: login.php'); // Replace 'login.php' with your login page URL
        exit();
    }
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
        <script>
            
            function saveChanges() {
                // Display a confirmation dialog
                var confirmation = confirm('Do you want to save changes?');

                if (confirmation) {
                    // Get form data
                    var newUsername = document.getElementById('nickname').value;
                    var userId = <?php echo isset($mm) ? $mm : 'null'; ?>;

                    // Create a new XMLHttpRequest object
                    var xhr = new XMLHttpRequest();

                    // Configure the request
                    xhr.open('POST', 'update_profile.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                    // Set up the callback function
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            // The request was successful
                            alert('Changes have been saved successfully!');
                            // Redirect to the user profile page
                            window.location.href = 'user_profile.php?User_Id=' + userId;
                        } else {
                            // There was an error
                            alert('Error updating username. Please try again.');
                        }
                    };

                    // Send the request
                    xhr.send('User_id=' + userId + '&new_username=' + newUsername);
                }
            }
            function saveChanges() {
    // Get form data
    var newUsername = document.getElementById('nickname').value;
    var userId = <?php echo isset($mm) ? $mm : 'null'; ?>;

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure the request
    xhr.open('POST', 'update_profile.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Send the request to check username availability
    xhr.onload = function () {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.available) {
                // Username is available; ask for confirmation
                var confirmation = confirm('Do you want to change your username to "' + newUsername + '"?');

                if (confirmation) {
                    // Create another XMLHttpRequest object to update the username
                    var updateXhr = new XMLHttpRequest();
                    updateXhr.open('POST', 'update_profile.php', true);
                    updateXhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                    // Set up the callback function
                    updateXhr.onload = function () {
                        if (updateXhr.status === 200) {
                            // The request was successful
                            alert('Username changed successfully!');
                            // Redirect to the user profile page
                            window.location.href = 'user_profile.php?User_Id=' + userId;
                        } else {
                            // There was an error
                            alert('Error updating username. Please try again.');
                        }
                    };

                    // Send the request to update the username
                    updateXhr.send('User_id=' + userId + '&new_username=' + newUsername);
                }
            } else {
                // Username is not available; display an error message
                alert('Username "' + newUsername + '" is already taken. Please choose a different username.');
            }
        } else {
            // There was an error
            alert('Error checking username availability. Please try again.');
        }
    };

    // Send the request to check username availability
    xhr.send('check_username=' + newUsername);
}

        </script>
    </head>
    <body>
    <div class="edit-profile-container">
        <h2>Edit Profile</h2>
        <form class="edit-profile-form">
            <input type="hidden" name="User_id" value="<?php echo isset($mm) ? $mm : ''; ?>">
            <label for="nickname">Username:</label>
            <input type="text" id="nickname" name="new_username" >

            <label for="avatar">Profile Picture:</label>
            <input type="file" id="avatar" name="avatar">

            <button type="button" onclick="saveChanges()">Save Changes</button>
            <!-- Return to User Profile button -->
        <div class="return-button">
            <button onclick="window.location.href = 'user_profile.php?User_Id=<?php echo isset($mm) ? $mm : ''; ?>'">
            Return to User Profile
            </button>    
        </div>
        </form>


    </div>
    </body>
    </html>
