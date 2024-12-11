<?php

session_start();
session_unset();
session_destroy();

// going back to front page
header("Location: ../Interface/Home.php");  

//debug code
// print_r("session ends");
