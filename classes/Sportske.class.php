<?php 



  class Sportske extends Entity{
	public static $tableName = "vesti";
	public static $keyCol = "id";
	
	public static function getNav(){
		$q = self::$db->query("select * from category where category = category");
		
		$cat = $q->fetchAll(PDO::FETCH_ASSOC);
		return $cat;
	}
	
	public static function getVesti(){
		$query = self::$db->query("select * from vesti order by id desc limit 8");
		return $query->fetchAll(PDO::FETCH_ASSOC);
		
	}
	
		
	public static function getVest(){
		$vest = self::$db->query("select * from vesti where id = 'id'");
		return $vest->fetch(PDO::FETCH_ASSOC);
		
	}
	
	public static function getFooter(){
		$query = self::$db->query("select * from vesti where  category = 'kosarka' order by id desc limit 2");
		return $query->fetchAll(PDO::FETCH_ASSOC);
		
	}
	
	public static function getSlider(){
		$query = self::$db->query("select * from vesti order by id desc limit 5");
		return $query->fetchAll(PDO::FETCH_ASSOC);
		
	}
	
	public static function getCategory($category){
		
		$q = self::$db->prepare("select * from vesti where category = :category");
		$q->bindParam(':category',$category);
		$q->execute();
		if($q->rowCount()>0){
			$cats = $q->fetchAll(PDO::FETCH_ASSOC);
			return $cats;
		}return false;
	}
	
	
	
	public static function renderNav(){
		$render="";
		foreach(self::getNav()as $link){
		$render .= "<li><a href='category.php?category={$link['category']}'>{$link['category']}</a></li>";
		
		}return $render;
		
		
	}
	
	public static function renderSlider(){
		$render = "";
		
		foreach(self::getSlider() as $last){
			
             $render .= "<li><img  src='images/{$last['slika']}' alt='' />";
             $render .= "<div class='panel-overlay'><h2>{$last['naslov']}</h2>";
             $render .= "<p>{$last['uvod']}</p>";
			$render .= "<a href='saznajVise.php?id=".$last['id']."'>Citaj dalje</a>";
             $render .= "</div></li>";

		}return $render;
		
	}
	
	
	public static function search(){
		
		
		
		  $render .= "<form action='' method='post'>";
          $render .= "<fieldset>";
          $render.="<legend>Site Search</legend>";
          $render.="<input type='text' name='search'>";
          $render .="<input type='submit' name='go' id='go' value='Search' />";
          $render.="</fieldset>";
          $render .= "</form>" ;    
		  return $render;
	}
	
	
	public static function render(){
		$render = "";
		foreach(self::getVesti() as $vest){
		 $render .="<div class='fl_left'>";
		  $render .=" <h2>{$vest['naslov']}</h2>";
		  $render .="<img width='100px' height='100px' src='images/{$vest['slika']}' alt='' >";
		  $render .="<p>{$vest['uvod']}</p>";
		  $render .= "<p>{$vest['vreme_objave']}</p>";
		  $render .= "<a href='saznajVise.php?id=".$vest['id']."'>Citaj dalje</a>";
       $render .= "</div>";
		}
		  return $render;
	  
	}
	
	
	public function renderDetails(){
		
		$render = "<div class='panel-group'>";
		$render .= "<div class='panel panel-primary'>";
		$render .= "<div class='panel-heading'><h5>{$this->naslov}</h5></div>";
		$render .= "<div class='panel-body'>";
		$render .= "<p>Kategorija: <i>{$this->category}</i></p><br>";
		$render .= "<p>Vreme: <i>{$this->vreme_objave}</i></p><hr>";
		$render .= "<p><i>{$this->uvod}</i></p>";
		$render .= "<div><img width='50%' src='images/{$this->slika}' class='img-thumbnail'></div><hr>";
		$render .= "<div>{$this->sadrzaj}</div><br>";
		$render .= "<p>Vasi komentari:</p>
		
		<br>";
		
		if(isset($_SESSION['ime'])){
		$render .= "<form action='comments.php?id={$this->id}' method='post'>";
		$render.= "<input type='text' name='username' value='".$_SESSION['ime']."' ><br>";
		$render.= "<textarea name='komentar'></textarea><br>";
		$render.= "<input type='submit' name='submit' value='posalji komentar'></form><br><br>";
		
		$res = self::$db->query("select * from komentari where vesti_id = ".$_GET['id']."");

			foreach($res as $kom){
				$render.= "<div style='border:1px solid gray' id='komentar'>" ;
				
				if($_SESSION['status'] == 'admin'){
					$render.= "<a href='delete.php?id=".$kom['comments_id']."'>
				<img src='images/delete-button.jpg' style='float:right';></a>"; 
				}
				
				$render.=  $kom['user']."<br>";
				$render.= $kom['vreme_objave']."<br><br>";
				$render.= $kom['komentari']."</div><br>";
			}
		
		}else {
			$render.= "<p style='color:red'>Morate biti ulogovani da biste kacili komentare</p>";
		}
	
		
		$render .= "</div></div>";	
		$render.="</div><br>";
		
		return $render;
	}
	
	
	public static function renderCategory($category){
		$render = "";
		foreach(self::getCategory($category)as $cat){
		$render .= "<div class='panel-group'>";
		$render .= "<div class='panel panel-primary'>";
		$render .= "<div class='panel-heading'><h3>{$cat['naslov']}</h3></div>";
		$render .= "<div class='panel-body' >";
		
		$render .= "<p>Vreme: <i>{$cat['vreme_objave']}</i></p><hr>";
		$render .= "<p><i>{$cat['uvod']}</i></p>";
		$render .= "<div><img width='50%' src='images/{$cat['slika']}' class='img-thumbnail'></div><hr>";
		$render .= "<div><a href='saznajVise.php?id={$cat['id']}'><button>Citaj dalje</button></a></div>";
		$render .= "</div></div></div><br>";
		}
		
		
		return $render;
	}
	public static function renderFooter(){
		$render = "";
		foreach(self::getFooter() as $vest){
		 $render .="<div class='fl_left'>";
		  $render .=" <h2>{$vest['naslov']}</h2>";
		  $render .="<img width='100px' height='100px' src='images/{$vest['slika']}' alt='' >";
		  $render .="<p>{$vest['uvod']}</p>";
		  $render .= "<p>{$vest['vreme_objave']}</p>";
       $render .= "</div>";
		}
		  return $render;
	  
	}
	
}
