<?php

if(isset($_POST["submit2"])){

    // grabbing the data from the form

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    

print_r("grabbed all the info successfully");

    // instantiating signup controler class

    include  "../Classes/DbConnector.php";
    include  "../Classes/signup.classes.php";
    include  "../Classes/signup-controller.classes.php";
    

    $signup = new signupController($firstname, $lastname, $email, $username, $password, $confirm_password);

    // running error handlers and user signup
    $signup->signupUser();

    //going back to front page
    header('Location: http://localhost/Quizzify\Quizzify/Interface/php_files/Home.php');
    // debug code
    print_r(" data saved successfully");

}