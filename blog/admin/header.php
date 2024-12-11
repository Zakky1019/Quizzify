<?php
require_once '../vendor/autoload.php';
session_start();
if(!isset($_SESSION['login-success'])){
    header('location:login.php');
}
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
use App\classes\Session;
use App\classes\UserLogin;
Use App\classes\Mail;
$name = $_SESSION['username'];
$userData = UserLogin::loginUserData("$name");
$title = '';
if($page == 'login.php'){
    $title = 'Home';
}elseif($page == 'addcategory.php' || $page == 'managecategory.php'){
    $title = 'Category';
}
elseif($page == 'addpost.php' || $page == 'managepost.php'){
    $title = 'Post';
}
else{
    $title = 'Home';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">
    <!--  summernote -->
    <link href="assets/summernote/dist/summernote.css" rel="stylesheet">
    <title><?= $title . ' | '?>Admin Pannel</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"
        media="screen" />
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

</head>

<body>

    <section id="container">
        <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <i class="fa fa-bars"></i>
            </div>
            <!--logo start-->
            <a href="index.php" class="logo"><span>Quzzify</span></a>
            <!--logo end-->
            
            <div class="top-nav ">
                <ul class="nav pull-right top-menu">
                    <li class="dropdown">
                            <div class="log-arrow-up"></div>
                            <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
            </div>
        </header>
       
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <ul class="sidebar-menu" id="nav-accordion">
                   
                    <li class="sub-menu">
                        <a href="javascript:;" <?= $page == 'addcategory.php' ? 'class="active"' : '' ?>
                            <?= $page == 'managecategory.php' ? 'class="active"' : '' ?>>
                            <i class="fa fa-shield"></i>
                            <span>Categories</span>
                        </a>
                        <ul class="sub">
                            <li <?= $page == 'addcategory.php' ? 'class="active"' : '' ?>><a href="addcategory.php">Add
                                    Category</a></li>
                            <li <?= $page == 'managecategory.php' ? 'class="active"' : '' ?>><a
                                    href="managecategory.php">Manage Category</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" <?= $page == 'addpost.php' ? 'class="active"' : '' ?>
                            <?= $page == 'managepost.php' ? 'class="active"' : '' ?>>
                            <i class="fa fa-thumb-tack"></i>
                            <span>Posts</span>
                        </a>
                        <ul class="sub">
                            <li <?= $page == 'addpost.php' ? 'class="active"' : '' ?>><a href="addpost.php">Add Post</a>
                            </li>
                            <li <?= $page == 'managepost.php' ? 'class="active"' : '' ?>><a href="managepost.php">Manage
                                    Post</a></li>
                        </ul>
                    </li>
                    </li>
                </ul>
            </div>
        </aside>
        <section id="main-content">
            <section class="wrapper">