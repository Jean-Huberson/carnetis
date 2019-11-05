<?php
class Request{
    public $_url;
    public $_data;
    public $_files;
    private $_server_request;

    function __construct(){
      $this->_url = isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'/';
      $this->_server_request = $_SERVER["REQUEST_METHOD"]; 
      $this->_server_request == "POST"? $this->_data = $_POST : $this->_data = $_GET;
      $this->_files = $_FILES;
      
    }
}