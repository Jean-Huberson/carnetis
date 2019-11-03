<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Connexion</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type=<?php echo BASE_URL.'/image/x-icon';?> href=<?php echo BASE_URL.'/img/favicon.ico';?>>
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/bootstrap.min.css';?>>
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/font-awesome.min.css';?>>
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/owl.carousel.css';?>>
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/owl.theme.css';?>>
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/owl.transitions.css';?>>
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/animate.css';?>>
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/normalize.css';?>>
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/main.css';?>>
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/morrisjs/morris.css';?>>
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/scrollbar/jquery.mCustomScrollbar.min.css';?>>
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/metisMenu/metisMenu.min.css';?>>
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/metisMenu/metisMenu-vertical.css';?>>
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/calendar/fullcalendar.min.css';?>>
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/calendar/fullcalendar.print.min.css';?>>
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/form/all-type-forms.css';?>>
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/style.css';?>>
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href=<?php echo BASE_URL.'/css/login-css/css/responsive.css';?>>
    <!-- modernizr JS
		============================================ -->
    <script src=<?php echo BASE_URL.'/js/login-js/js/vendor/modernizr-2.8.3.min.js';?>></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
  
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login"><br/><br/><br/><br/>
                    <h3>CONNEXION</h3><br/><br/>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="#" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">E-mail</label>
                                <input type="email" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                               
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Mot de passe</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                
                            </div>
                            <div class="checkbox login-checkbox">
                                <label>
										            <input type="checkbox" class="i-checks"> Se souvenir de moi</label>
                                
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Connexion</button>
                            <a class="btn btn-default btn-block" href=<?php echo BASE_URL.DS.'customer'.DS.'register';?>>Inscription</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 text-center"><br/><br/>
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> -Tous droits réservés | Carnetis</p>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src=<?php echo BASE_URL.'/js/login-js/js/vendor/jquery-1.11.3.min.js';?>></script>
    <!-- bootstrap JS
		============================================ -->
    <script src=<?php echo BASE_URL.'/js/login-js/js/bootstrap.min.js';?>></script>
    <!-- wow JS
		============================================ -->
    <script src=<?php echo BASE_URL.'/js/login-js/js/wow.min.js';?>></script>
    <!-- price-slider JS
		============================================ -->
    <script src=<?php echo BASE_URL.'/js/login-js/js/jquery-price-slider.js';?>></script>
    <!-- meanmenu JS
		============================================ -->
    <script src=<?php echo BASE_URL.'/js/login-js/js/jquery.meanmenu.js';?>></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src=<?php echo BASE_URL.'/js/login-js/js/owl.carousel.min.js';?>></script>
    <!-- sticky JS
		============================================ -->
    <script src=<?php echo BASE_URL.'/js/login-js/js/jquery.sticky.js';?>></script>
    <!-- scrollUp JS
		============================================ -->
    <script src=<?php echo BASE_URL.'/js/login-js/js/jquery.scrollUp.min.js';?>></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src=<?php echo BASE_URL.'/js/login-js/js/scrollbar/jquery.mCustomScrollbar.concat.min.js';?>></script>
    <script src=<?php echo BASE_URL.'/js/login-js/js/scrollbar/mCustomScrollbar-active.js';?>></script>
    <!-- metisMenu JS
		============================================ -->
    <script src=<?php echo BASE_URL.'/js/login-js/js/metisMenu/metisMenu.min.js';?>></script>
    <script src=<?php echo BASE_URL.'/js/login-js/js/metisMenu/metisMenu-active.js';?>></script>
    <!-- tab JS
		============================================ -->
    <script src=<?php echo BASE_URL.'/js/login-js/js/tab.js';?>></script>
    <!-- icheck JS
		============================================ -->
    <script src='js/login-js/js/icheck/icheck.min.js'></script>
    <script src='js/login-js/js/icheck/icheck-active.js'></script>
    <!-- plugins JS
		============================================ -->
    <script src=<?php echo BASE_URL.'/js/login-js/js/plugins.js';?>></script>
    <!-- main JS
		============================================ -->
    <script src=<?php echo BASE_URL.'/js/login-js/js/main.js';?>></script>
</body>

</html>
