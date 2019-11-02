<?php
	
Class Database{

	private static $_debug = 1;
	private static $_host = DB_HOST;
	private static $_db_name = DB_NAME;
	private static $_db_user = DB_USER;
	private static $_db_pass = DB_PASS;
	public 	static $_saveConnectionDB;

	public static $_link;
	public static $_error;
	
	public function connectDB(){
		Self::$_link = null;

		try{

			Self::$_link = new PDO("mysql:host=".Self::$_host.";dbname=".Self::$_db_name, Self::$_db_user, Self::$_db_pass);
			Self::$_saveConnectionDB = Self::$_link;
			Self::$_link->exec("set names utf8");
			Self::$_error = "Connection ok";
		}
		catch(PDOException $exception){
			if(Self::$_debug >= 1){
				Self::$_error =  "Connection error: ".$exception->getMessage();	
			}
			else{
				Self::$_error = "Impossible de se connecter à la base de données";
			}
		}
		return Self::$_link;			
	}

}
