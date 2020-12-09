<?php include_once "inc/header.php";
  include_once "core/init.php";
  $db = Connect::getInstance();
  

 
 
 ?>

<div class="wrapper">
  <div id="header">
    <div class="fl_left">
      <h1><a href="index.php"><strong>S</strong>portske <strong>V</strong>esti</a></h1>
      <p>Najnovije sportske vesti </p>
    </div>
    <div class="fl_right"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <br class="clear" />
  </div>
</div>

<?php include_once "inc/nav.php";?>

<div class="wrapper">

   <div class="wrapper">
  <div class="container">
  
  
    <div>
       
	  <a href="www.it-akademija.com">
 <img src="images/logo.jpg" alt=""><br><p>Prijavite se na vreme</p>
 </a>
  
	   
    </div>
 
 
  
    <div class="column">
       
	   <?php 
	   include_once "core/init.php";
	   if(isset($_SESSION['w'])){
		   include_once "widgets/".$_SESSION['w'].".php";
	   }else{
		   include_once "widgets/loginW.php";
	   }
	   
	   
	   
	   
	   ?>
	   
    </div>
    <br class="clear" />
  </div>
</div>

<div class="wrapper">
  <div id="adblock">
    <div class="fl_left"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <div class="fl_right"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <br class="clear" />
  </div>
  <div id="hpage_cats">
  
   <?php

  echo Sportske::renderCategory($_GET['category']);
   
   ?>
   
    <br class="clear" />
  </div>
</div>

<div class="wrapper">
  <div class="container">
     <div id="hpage_cats">
	 <h3>Poslednje vesti iz kosarke</h3>
   <?php echo Sportske::renderFooter();?>
   
    <br class="clear" />
  </div>
    <div class="column">
      <div class="holder"><a href="#"><img src="images/demo/300x250.gif" alt="" /></a></div>
      <div class="holder"><a href="#"><img src="images/demo/300x80.gif" alt="" /></a></div>
    </div>
    <br class="clear" />
  </div>
</div>

</body>
</html>