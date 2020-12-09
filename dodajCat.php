

<?php include_once "inc/header.php";
  include_once "core/init.php";


$db = Connect::getInstance();

$cats = $db->query('select * from category');

?>


<div class="wrapper">
  <div id="header">
    <div class="fl_left">
      <h1><a href="index.php"><strong>A</strong>dministrator </h1>
      
    </div>
    <div class="fl_right"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <br class="clear" />
  </div>
</div>

<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
        <li class="active"><a href="unosVesti.php">Glavna</a></li>
        <li><a href="dodajPost.php">Unos vesti</a></li>
        <li><a href="dodajCat.php">Unos kategorija</a></li>
        <li ><a href="index.php">pogled na sajt</a></li>
        <li class="last"><a href="logout.php">logout</a></li>
      </ul>
    </div>
    
    <br class="clear" />
  </div>
</div>

<div class="wrapper">
  <div class="container">
  <?php

if(isset($_POST['submit'])){
	 
	
	 $category = $_POST['category'];
	 
	
	 if($category =="" ){
		 echo "Popunite sva polja";
	 }else{
		
		$query = "insert into category (category) values (:category)";
		$st = $db->prepare($query);
		$st->bindParam(':category', $category);
		$st->execute();

		
	echo "<div align='center' style='padding-top:55px';>Post je unet u bazu</div>";
		
	 }
	
 }
 






  ?>
  
 
  <h1>Unesi kategoriju</h1><br>
  
  
  
  		 <form action="dodajCat.php" method="post" >
			
			
			<label>Dodaj kategoriju</label><br>
				<input type="text" name="category"><br>
			<br>
			

				  <input type="submit" name="submit" >
			

			   
        </form>
  
  
  
    <br class="clear" />
  </div>
</div>
</body>
</html>


