<?php

if(isset($_POST["submit1"])){

    // grabbing the data from the form

    $username = $_POST["username"];
    $password = $_POST["password"];    

print_r("grabbed all the info successfully");

    // instantiating signup controler class

    include  "../Classes/DbConnector.php";
    include  "../Classes/login.classes.php";
    include  "../Classes/login-controller.classes.php";

    $login = new loginController( $username, $password);

     // Check if the user's email is verified before allowing login
     if ($login->verifyEmailBeforeLogin($username)) {
        // Email verified, proceed with login
        $login->loginUser();
        // Going back to the front page
        header('Location: ../Interface/Register.php?error=emailVerified');
        // Debug code
        print_r(" data saved successfully");
    } else {
        // Email not verified, redirect to error page or show a message
        header('Location: ../Interface/Register.php?error=emailNotVerified');
        exit();
    }

}