<?php
class Session{

	 public function __construct(){
		 if(!isset($_SESSION)){
			session_start();
		 }
	 }
	 
	 public function setSession($key, $val){
		$_SESSION[$key] = $val;
	 }

	 public function getSession($key){
	 	if (isset($_SESSION[$key]) && !empty($_SESSION[$key])) {
	 		return $_SESSION[$key];
	 	} else {
	 		return false;
	 	}
	 }

	  public function checkAdminSession(){
	 	$this->init();
	 	if ($this->getSession($key) == false) {
	 		$this->destroy();
	 		header('Location:'.BASE_URL.DS.'page'.DS.'index');
	 	}
	 }

	  public function checkAdminLogin(){
	 	$this->init();
	 	if ($this->getSession($key) == true) {
	 		header('Location:'.BASE_URL.DS.'page'.DS.'index');
	 	}
	 }

	 public function checkSession(){
	 	if ($this->getSession($key) == false) {
	 		$this->destroy();
	 		header('Location:'.BASE_URL.DS.'page'.DS.'index');
	 	}
	 }

	public function checkLogin($key){
	 	if ($this->getSession($key) == true) {
	 		header('Location:'.BASE_URL.DS.'page'.DS.'index');
	 	}
	}

	 public function destroy(){
	 	session_destroy();
	 	session_unset();
	 }
}
