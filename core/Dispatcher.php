<?php
class Dispatcher{
    var $_request;

    function __construct(){
        $this->_request = new Request();
        $url = $this->_request->_url;
        Rooter::parse($url, $this->_request);
        $controller = $this->loadController();
        
        if(!in_array($this->_request->action, get_class_methods($controller))){
            $this->manage_error('Le controller ** '.$this->_request->controller.' ** n\'a pas de page ** '.$this->_request->action.'.php ** qui existe!');
        }
        else{
            call_user_func_array(array($controller, $this->_request->action), $this->_request->params);
            $controller->render($this->_request->action);
        } 
    }

    /**
     * loadController() est la fonction dédiée pour charger dynamiquement le bon controller 
     * Je fais new $name parce que $name represente la classe qui herite du controller
     */
    function loadController(){
        if(isset($this->_request->controller) && !empty($this->_request->controller)){
            $nameController = ucfirst($this->_request->controller).'Controller';
            $files = ROOT.DS.'controller'.DS.$nameController.'.php';
            require $files;
            return new $nameController($this->_request);
            
        }
        else{
            $nameController = 'PageController';
            $files = ROOT.DS.'controller'.DS.$nameController.'.php';
            require $files;
            return new $nameController($this->_request);
            
        }
        
        
    }

    /**
     * manage_error() fonction permettant de gérer les erreurs de redirection
     */
    function manage_error($message){
        header("HTTP/1.0 404 Not Found");
        $controller = new Controller($this->_request);
        $controller->set("message",$message);
        $controller->render("/error/error");
        die();  
    }
}