<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Carnetis</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href=<?php echo BASE_URL.'/style.css';?> >

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="conferNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="./index.php"><img src=<?php echo BASE_URL.'/img/core-img/logo.png';?>></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li class="active"><a href="index.php">Accueil</a></li>
                                <li><a href="#">Catégories</a>
                                    <ul class="dropdown">
                                        <li><a href="category.php">Toutes</a></li>
                                        <li><a href="about.php">About Us</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">évènements</a>
                                    <ul class="dropdown">
                                        <li><a href="events.php">Voir tous</a></li>
                                        <li><a href="#">Créez-en un</a></li>
                                    </ul>
                                </li>
                                <li><a href="tickets.php">Réservations</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="contacts.php">Contacts</a></li>
                            </ul>

                            <!-- Get Tickets Button -->
                            <a href=<?php echo BASE_URL.DS.'customer'.DS.'login';?> class="btn confer-btn mt-3 mt-lg-0 ml-3 ml-lg-5">Connexion <i class="zmdi zmdi-long-arrow-right"></i></a>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
