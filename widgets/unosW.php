<?php 

include_once "core/init.php";

$db = Connect::getInstance();

$posts = $db->query("select * from vesti");








?>


<h1> Unos Vesti </h1>

	<table>

	<tr>
		<th>Id Vesti</th>
		<th>Naslov</th>
		<th>Autor</th>
		<th>Datum</th>
	</tr>
	<?php while($row = $posts->fetch()){?>
	<th>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<?php } ?>
	</th>



	</table>