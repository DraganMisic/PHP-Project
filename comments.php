<?php include_once "inc/header.php";
  include_once "core/init.php";
  $db = Connect::getInstance();
  $id="";
  if(isset($_GET['id'])){
	  $id = $_GET['id'];
  }
  if(isset($_POST['submit'])){
	 // $user = $_POST['korisnik'];
	// $kom = $_POST['komentar'];
	 $sql ="INSERT INTO komentari (
	
	 user,
	 vesti_id,
	 komentari
	 
	 )values(
	 
	 :user,
	 :vesti_id,
	 :komentari

	 )";
	 $stm = $db->prepare($sql);
	 $stm->bindParam(':user',$_POST['username']);
	 $stm->bindParam(':vesti_id',$id);
	 $stm->bindParam(':komentari',$_POST['komentar']);
	 $stm->execute();
	
	header("Location: " . $_SERVER['HTTP_REFERER']);
	 
  }
 