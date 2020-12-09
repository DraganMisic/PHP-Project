<?php include_once "inc/header.php";
  include_once "core/init.php";
$db = Connect::getInstance();

$id = $_GET['id'];

  
	Sportske::remove($id);
	Comments::remove($id);
	header("location: unosVesti.php");