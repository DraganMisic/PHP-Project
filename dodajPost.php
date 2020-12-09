

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
	 
	 $naslov = $_POST['naslov'];
	 $uvod = $_POST['uvod'];
	 $sadrzaj = $_POST['sadrzaj'];
	 $category = $_POST['category'];
	 $autor = $_POST['autor'];
	 //slika
	 $slika = $_FILES['slika']['name'];
	 $slika_tmp = $_FILES['slika']['tmp_name'];
	move_uploaded_file($slika_tmp,"images/{$slika}");
	 if($naslov =="" OR $uvod =="" OR $sadrzaj ==""){
		 echo "Popunite sva polja";
	 }else{
		
		
		$vest = new Sportske();
		
		$vest->naslov =$naslov;
		 $vest->uvod =$uvod;
		 $vest->sadrzaj =$sadrzaj;
		 $vest->category =$category;
		 $vest->slika = $slika;
		 $vest->autor = $autor;
		 $vest->insert();
		
	echo "<div align='center' style='padding-top:55px';>Post je unet u bazu</div>";
		
	 }
	
 }
 






  ?>
  
 
  <h1>Unesi vest</h1><br>
  
  
  
  		 <form action="dodajPost.php" method="post" enctype="multipart/form-data" >
			
			
			<label>Naslov</label><br>
				<input type="text" name="naslov"><br>
			<br>
			
				<label>uvod</label><br>
				 <input type="text" name="uvod"> <br>
			<br>
			
			<label>sadrzaj</label><br>
				 <textarea name="sadrzaj"></textarea> <br>
		<br>
			
			<label>kategorija</label><br>
				<select name="category">
				<option>Selektuj kategoriju</option>
				<?php while($row = $cats->fetch()){?>
				<option value="<?php echo $row['category']?>"><?php echo $row['category']?></option> <?php }?>
				</select>
				
			<br>
			
			<label>autor</label><br>
				 <input type="text" name="autor"> <br>
			<br>
			
			<label>slika</label><br>
				 <input type="file" name="slika"> <br>
			<br>
			
			  
			 
				  <input type="submit" name="submit" value="Unesi vest">
				   
			
			

			   
        </form>
  
  
  
    <br class="clear" />
  </div>
</div>
</body>
</html>


