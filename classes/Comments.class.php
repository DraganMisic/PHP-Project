<?php 


class Comments extends Entity{
	public static $tableName = "komentari";
	public static $keyCol = "comments_id";
	
	
	
	public static function ukupnoKom(){
		$res1 = $db->query("select * from komentari where vesti_id = '$id' ");
        $res2 = $res1->rowCount();
	}
}