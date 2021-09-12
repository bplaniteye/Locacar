<?php
/**
Classe créé par le générateur.
*/
class Voiture extends Table 
{
	public function __construct($id=0)
	{
		parent::__construct("voiture", "voi_id",$id);
	}

	static public function afficheInfo() 
	{
		$sql="select * from categorie,voiture,agence where voi_categorie=cat_id and voi_localisation=age_id";
		$statement = self::$link->prepare($sql);		
		try {
			$statement->execute();
		} catch(Exception $e) {
			var_dump($e);
		}
		return $statement->fetchAll();
	}










}
?>
