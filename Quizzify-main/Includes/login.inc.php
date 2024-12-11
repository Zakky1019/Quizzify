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

    // running error handlers and user login
    $login->loginUser();

    //going back to front page

    header('Location: http://localhost/Quizzify/Quizzify/Interface/php_files/');
    // debug code
    print_r(" data saved successfully");

}