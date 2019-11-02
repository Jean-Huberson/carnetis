<?php
class Controller{
    public $_request;
    private $_vars = array();
    private $_isRendered = false;

    function __construct($request){
        $this->_request = $request;
    }

    /**
     * la methode render() renvoie la vue demandée en fonction controller
     * $nameView contient l'action demandée
     * on verifie si la vue a ete rendu avec _isrendered
     */
    function render($nameView){

        if($this->_isRendered){
            return false;
        }
        extract($this->_vars);
        if(strpos($nameView, '/') === 0){
            $view = ROOT.DS.'view'.$nameView.'.php';
        }elseif(empty($this->_request->controller)){
            $view = ROOT.DS.'view'.DS.'page'.DS.$nameView.'.php';
        }
        else{
            $view = ROOT.DS.'view'.DS.$this->_request->controller.DS.$nameView.'.php';
        }
        require $view; 
        $this->_isRendered = true;
    }

    /**
     * set() permet d'envoyer les informations a la vue a travers des variables
     * $key && $value sont passés en parametre afin d'obtenir la clef et la valeur contenu  dans le tableau _vars
     */
    function set($key, $value = null){
        if(is_array($key)){
            $this->_vars += $key;
        }
        else{
            $this->_vars[$key] = $value;
        }
    }

    /**
     * loadModel() cette fonction permet de charger le model
     * $name parametre passé en argument representant le nom du model dans la base de donées
     */
    function loadModel($name){
        $filePath = ROOT.DS.'model'.DS.$name.'.php';
        require_once($filePath);
        if(!isset($this->$name)){
            $this->$name = new $name();
        }
    }

}