<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - Kahoot-like Website</title>
    <style>
        /* CSS styles for the change password page */
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            background:  url('http://localhost/Quizzify/Quizzify/images/bg1.jpg') ;                background-size: cover;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: black;
        }

        .change-password-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            margin-top: 100px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .change-password-form {
            display: flex;
            flex-direction: column;
        }

        .change-password-form label {
            margin-bottom: 10px;
        }

        .change-password-form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .change-password-form button {
            width: 100%;
            padding: 10px 30px;
            cursor: pointer;
            display: block;
            margin-top: 10px;
            background: linear-gradient(to right, #4AA017, #b3f58d);
            border: 0;
            outline: none;
            border-radius: 30px;
            transition: background-color 0.3s ease;
            color: white;
            font-weight: bold;
        }

        /* CSS for the hover effect */
        .change-password-form button:hover {
            background: linear-gradient(to right, #b3f58d, #4AA017);
        }

        /* Style for the return button */
        .return-button {
            text-align: center;
            margin-top: 10px;
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

        .return-button a:hover {
            background: linear-gradient(to right, #b3f58d, #4aa017);
        }
    </style>
</head>
<body>
<div class="change-password-container">
    <h2>Change Password</h2>
    <form class="change-password-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="oldPassword">Old Password:</label>
        <input type="password" id="oldPassword" name="oldPassword" required>

        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" required>

        <label for="confirmNewPassword">Confirm New Password:</label>
        <input type="password" id="confirmNewPassword" name="confirmNewPassword" required>

        <button type="button" onclick="confirmChangePassword()">Change Password</button>
    </form>

    <!-- Return to User Profile button -->
    <div class="return-button">
        <a href="participantprofile.php">Return to User Profile</a>
    </div>
    
</div>

<script>
    function confirmChangePassword() {
    // Display a confirmation dialog
    var confirmation = confirm('Do you want to change your password?');

    if (confirmation) {
        // Append User_Id to the form action and then submit the form
        document.querySelector(".change-password-form").action = "change_password_script.php?User_Id=<?php echo $_GET['User_Id']; ?>";
        document.querySelector(".change-password-form").submit();
    }
}

</script>
</body>
</html>
