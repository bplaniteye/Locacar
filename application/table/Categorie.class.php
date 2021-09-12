<?php
/**
Classe créé par le générateur.
*/
class Categorie extends Table {
	public function __construct($id=0) {
		parent::__construct("categorie", "cat_id",$id);
	}


	static public function findVoiture($cat_id) 
	{
		$sql="select * from categorie,voiture,agence where voi_categorie=cat_id and voi_localisation=age_id and cat_id=:cat_id";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":cat_id",$cat_id,PDO::PARAM_INT);
		try {
			$statement->execute();
		} catch(Exception $e) {
			var_dump($e);
		}
		return $statement->fetchAll();
	}

}
?>
