<?php



class Entity {

public static $db;

	public static function get($id){
		$tableName = static::$tableName;
		$keyCol = static::$keyCol;
		$className = get_called_class();
		
		$q = self::$db->query("select * from {$tableName} where {$keyCol} = {$id}");
		$post = $q->fetchObject($className);
		return  $post;
	}
	
	public static function getAll(){
		$tableName = static::$tableName;
		
		
		$q = self::$db->query("select * from {$tableName}");
		$posts = $q->fetchAll(PDO::FETCH_ASSOC);
		return  $posts;
	}
	
		public static function remove($id){
		$tableName = static::$tableName;
		$keyCol = static::$keyCol;
		
		$q = self::$db->query("delete  from {$tableName} where {$keyCol} = {$id}");
		
	}
	
	
	public function insert(){
		$tableName = static::$tableName;
		$q = "insert into {$tableName} (";
		$k= "";
		$vel="";
		foreach($this as $k=>$v){
			$q .= $k .", ";
			$vel.= "'".$v."', ";
		}
		$q = trim($q, ', ');
		$q .= ") values (";
		$q .= $vel;
		$q = trim($q, ', ');
		$q .= ")";
		
		$q = self::$db->query($q);
	}
	
		public static function update($id,$params = null){
			$tableName = static::$tableName;
		    $key = static::$keyCol;
			
			$q = "update {$tableName} set ";
			$keys = array_keys($params);
			$values = array_values($params);
			
			foreach($keys as $k){
				if($k == $key) continue;
				$q .= $k ." = ?, ";
			}
			$q = trim($q, ', '). " WHERE {$key} = ? ";
			$stmt = self::$db->prepare($q);
			$n =1;
			foreach($values as $v){
				$stmt->bindValue($n, $v);
				$n++;
			}
			$stmt->bindValue($n, $id);
			$stmt->execute();
			
		
	}

 public static function init(){
		self::$db = Connect::getInstance();
	}
	
	

}

Entity::init();