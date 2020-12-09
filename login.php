<?php

include_once "core/init.php";
$db = Connect::getInstance();
$_SESSION['w'] = 'loginW';
header("location: index.php");

if(isset($_POST['username'],$_POST['username'])){
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	
	if(!empty($username) && !empty($password)){
	
		$stmt = $db->prepare("select * from users where username = ? and password = ?");
		$stmt->bindValue(1,$username);
		$stmt->bindValue(2,$password);
		$stmt->execute();
		
		if($stmt->rowCount() > 1){
			
			die("greska");
		}else if($stmt->rowCount() == 0){
			
			die ("nepoznat korisnik");
		}
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		
			$_SESSION['username'] = $user['username'];
			$_SESSION['ime'] = $user['ime'];
			$_SESSION['prezime'] = $user['prezime'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['status']= $user['status'];
			$_SESSION['w'] = 'infoW';
			
			if($_SESSION['status'] == 'admin'){
			$_SESSION['ime'] = $user['ime'];
			$_SESSION['prezime'] = $user['prezime'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['w'] = 'infoW';
			$_SESSION['w'] = 'adminW';
			}
		
			
		header('location: index.php');
	}
	
}

