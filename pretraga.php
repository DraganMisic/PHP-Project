
<?php 
 include_once "inc/header.php";
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
  if(isset($_POST['naslov'])){
	$naslov = $_POST['naslov'];
	$q = $db->query("select * from vesti where naslov like '%$naslov%'");
	
	foreach($q->fetchAll()as $rez){
		
  echo  "<div>". $rez['naslov']."<br><br>". $rez['uvod'] . "<br><br>".  $rez['sadrzaj']."<br></div><br><br><hr>";
  
   
  
	}
}
   ?>
    <br class="clear" />
  </div>
</div>

<div class="wrapper">
 
</div>

</body>
</html>