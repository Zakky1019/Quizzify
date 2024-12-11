<?php

namespace Classes;
session_start();

if (isset($_POST["submit2"])) {

    // grabbing the data from the form

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $play = $_POST["play"];
    $create = $_POST["create"];

    // instantiating signup controler class

    include  "../Classes/DbConnector.php";
    include  "../Classes/signup.classes.php";
    include  "../Classes/signup-controller.classes.php";


    $signup = new signupController($firstname, $lastname, $email, $username, $password, $confirm_password, $play, $create);

    // running error handlers and user signup
    $signup->signupUser();

    
}
