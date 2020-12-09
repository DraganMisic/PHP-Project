

<?php include_once "inc/header.php";
  include_once "core/init.php";


$db = Connect::getInstance();

$cat = $db->query('select * from category');

$id = $_GET['id'];

$res = $db->query("select * from vesti where id = '$id'");
$single = $res->fetch();

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
        <li><a href="unosCat">Unos kategorija</a></li>
        <li class="last"><a href="index.php">pogled na sajt</a></li>
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
		
		
		Sportske::update($id,array(
		'naslov' => $naslov,
		'uvod' => $uvod,
		'sadrzaj' => $sadrzaj,
		'category' => $category,
		'autor' => $autor,
		'slika' => $slika
		));
		
		
	echo "<div align='center' style='padding-top:55px';>Post je izmenjen u bazi</div>";
		header("location: unosVesti.php");
	 }
	
 }
 






  ?>
  
 
  <h1>Izmeni vest</h1><br>
  
  
  
  		 <form action="editPost.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data" >
		 
			
			<label>Naslov</label><br>
				<input type="text" name="naslov" value="<?php echo $single['naslov'] ?>"> <br>
		
			
			
			<label>uvod</label><br>
				<input type="text" name="uvod" value="<?php echo $single['uvod'] ?>"> <br>
			
			
			
			<label>Sadrzaj</label><br>
			 <textarea name="sadrzaj"  > <?php echo $single['sadrzaj']; ?></textarea> <br>
			
			
			
		<label>Kategorija</label><br>
				<select name="category">
				<option>Selektuj kategoriju</option>
				<?php while($row = $cat->fetch()){?>
				<option value="<?php echo $row['category']?>"><?php echo $row['category']?></option> <?php }?>
				</select><br>
			
		
			
			<label>slika</label><br>
				<input type="file" name="slika" >
				<img src="images/<?php echo $single['slika'];?> " width="100px" height="100px"><br>
				
				
				<label>autor</label><br>
				 <input type="text" name="autor" value="<?php echo $single['autor'] ?>"> <br>
				
			
		
			  <input type="submit" name="update" value="update">  &nbsp&nbsp&nbsp
				<a href="unosVesti.php">odustani</a>  &nbsp&nbsp &nbsp
				<a href="delete.php?id=<?php echo $id; ?>">brisi</a>
			

			   
        </form>
		
  
  
  
    <br class="clear" />
  </div>
</div>
</body>
</html>


