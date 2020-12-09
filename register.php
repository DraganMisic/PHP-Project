<?php

include_once "core/init.php";
$db = Connect::getInstance();
$_SESSION['w'] = 'registerW';
header("Location: index.php");

if(isset($_POST['username'],$_POST['password'],$_POST['ime'],$_POST['prezime'],$_POST['email'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$ime = $_POST['ime'];
	$prezime = $_POST['prezime'];
	$email = $_POST['email'];
	$password = md5($password);
	
	if(!empty($username) && !empty($password) && !empty($ime)&& !empty($prezime)&& !empty($email)){
		
		$user = new User;
		$user->username = $username;
		$user->password = $password;
		$user->ime = $ime;
		$user->prezime = $prezime;
		$user->email = $email;
	
		$user->insert();
		
		echo "reg ste";
		
	
}
}