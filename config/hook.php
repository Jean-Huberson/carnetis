<?php
Session::init();

    if(!Session::getLogin("login")){
        header('Location:'.BASE_URL.DS.'customer'.DS.'login');
    }
