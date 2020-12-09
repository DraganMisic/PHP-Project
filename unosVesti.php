<?php include_once "inc/header.php";
  include_once "core/init.php";


$db = Connect::getInstance();

$posts = $db->query("select * from vesti");

$cats = $db->query("select * from category");






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
        <li><a href="index.php">pogled na sajt  </a></li>
        <li class="last"><a href="logout.php"> logout</a></li>
      </ul>
    </div>
    
    <br class="clear" />
  </div>
</div>

<div class="wrapper">
  <div class="container">
    <h1> Unos Vesti </h1>

	<table style="width:70%">

	<tr align="center">
		<th>Id Vesti</th>
		<th>Naslov</th>
		<th>Autor</th>
		<th>Datum</th>
	</tr>
	<?php while($row = $posts->fetch()){?>
	<tr>
		<td><?php echo $row['id'];?></td>
		<td>
		<a href="editPost.php?id=<?php echo $row['id'];?>">
		<?php echo $row['naslov'];?></a></td>
		<td><?php echo $row['autor'];?></td>
		<td><?php echo $row['vreme_objave'];?></td>
		
		<?php } ?>
	</tr>



	</table>
   <hr>
       <h2> Kategorije</h2>
   
   	<table style="width:70%">
	
	

	<tr align="center">
		<th>Id kategorije</th>
		<th>Kategorija</th>
		
	</tr>
	<?php while($row1 = $cats->fetch()){?>
	<tr>
		<td><?php echo $row1['id'];?></td>
		<td>
		<a href="editCat.php?id=<?php echo $row1['id']?>">
		<?php echo $row1['category'];?></a></td>
		
		<?php } ?>
	</tr>



	</table>
    <br class="clear" />
  </div>
</div>


</body>
</html>