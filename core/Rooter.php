<?php
class Rooter{
  
  static function parse($url, $request){
    $params = trim($url, "/");
    $params = explode("/", $params);
    $request->controller = isset($params[0])? $params[0]: 'page';
    $request->action = isset($params[1])? $params[1]: 'index';
    $request->params = array_slice($params, 2);
    
    return true;
  }
}