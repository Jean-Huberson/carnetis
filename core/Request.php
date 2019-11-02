<?php
class Request{
    public $_url;

    function __construct(){
      $this->_url = $_SERVER['PATH_INFO'];
    }
}