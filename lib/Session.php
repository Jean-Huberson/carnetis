<?php
class Session{
	 public static function init(){
	 	session_start();
	 }
	 
	 public static function set($key, $val=null){
		if(is_array($key)){
            $_SESSION += $key;
        }
        else{
            $_SESSION[$key] = $val;
        }
	 	 
	 }

	 public static function get($key){
	 	if (isset($_SESSION[$key])) {
	 		return $_SESSION[$key];
	 	} else {
	 		return false;
	 	}
	 }

	  public static function checkAdminSession(){
	 	self::init();
	 	if (self::get("adminLogin") == false) {
	 		self::destroy();
	 		header("Location:login.php");
	 	}
	 }

	  public static function checkAdminLogin(){
	 	self::init();
	 	if (self::get("adminLogin") == true) {
	 		header("Location:index.php");
	 	}
	 }

	 public static function checkSession(){
	 	if (self::get("login") == false) {
	 		self::destroy();
	 		header("Location:index.php");
	 	}
	 }

	 public static function checkLogin(){
	 	if (self::get("login") == true) {
	 		header(BASE_URL.DS.'page'.DS.'index');
	 	}
	 }

	 public static function destroy(){
	 	session_destroy();
	 	session_unset();
	 }
}
