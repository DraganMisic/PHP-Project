<?php
session_start();
$GLOBALS['config'] =array(

	'DB'=>array(
	'host' => 'localhost',
	'user' => 'root',
	'password' => '',
	'db_name' => 'sportske',
	
	),
	'status'=> true,
	'dir' => "c:/wamp/www/vesti/",
	'session' => array()

);

spl_autoload_register(function($className){
	require_once "classes/{$className}.class.php";
});