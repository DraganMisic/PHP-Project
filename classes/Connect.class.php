<?php

class Connect{
	private static $_instance = null;
	
	private function __construct(){}
	public static function getInstance(){
		if(is_null(self::$_instance))
		self::$_instance =  new PDO("mysql:host=".Config::get('DB/host') .";dbname=". Config::get('DB/db_name').";charset=utf8;",Config::get('DB/user'),Config::get('DB/password'));
		
		return self::$_instance;
	}
}