<?php
/**
Classe créé par le générateur.
*/
class Agence extends Table 
{
	public function __construct($id=0) 
	{
		parent::__construct("agence","age_id",$id);
	}
	
	public static function accueil_rechercher($chaine) {	
		$sql="select * from agence where age_ville  like :chaine or age_departement like :chaine ";
		$statement = self::$link->prepare($sql);		
		$statement->bindValue(":chaine","%$chaine%",PDO::PARAM_STR);
		try {
			$statement->execute();
		} catch(Exception $e) {
			var_dump($e);
		}
		return $statement->fetchAll();
	}
/*
	static public function findInfo($age_id) 
	{
		$sql="select * from agence,employe,voiture where emp_agence=age_id and voi_localisation=age_id  and age_id=:age_id";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":age_id",$age_id, PDO::PARAM_STR);
		try 
		{
			$statement->execute();
		} 
		catch(Exception $e) 
		{
			var_dump($e);
		}
		return $statement->fetchAll();
	}
*/
	static public function findInfo($age_id) 
	{
		$sql="select * from agence where age_id=:age_id";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":age_id",$age_id, PDO::PARAM_STR);
		try 
		{
			$statement->execute();
		} 
		catch(Exception $e) 
		{
			var_dump($e);
		}
		return $statement->fetchAll();
	}

	static public function findVoiture($age_id) 
	{
		$sql="select * from agence,voiture where voi_localisation=age_id  and age_id=:age_id";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":age_id",$age_id, PDO::PARAM_STR);
		try 
		{
			$statement->execute();
		} 
		catch(Exception $e) 
		{
			var_dump($e);
		}
		return $statement->fetchAll();
	}

	static public function findEmploye($age_id) 
	{
		$sql="select * from agence,employe where emp_agence=age_id  and age_id=:age_id";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":age_id",$age_id, PDO::PARAM_STR);
		try 
		{
			$statement->execute();
		} 
		catch(Exception $e) 
		{
			var_dump($e);
		}
		return $statement->fetchAll();
	}

	static public function findLocation($age_id) 
	{
		$sql="select * from agence,location where locagencedepart=age_id  
		and age_id=:age_id";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":age_id",$age_id, PDO::PARAM_STR);
		try 
		{
			$statement->execute();
		} 
		catch(Exception $e) 
		{
			var_dump($e);
		}
		return $statement->fetchAll();
	}





	public static function agence_rechercher($chaine) 
	{	
		$sql="select * from agence where age_ville  like :chaine or age_departement like :chaine ";
		$statement = self::$link->prepare($sql);		
		$statement->bindValue(":chaine","%$chaine%",PDO::PARAM_STR);
		try {
			$statement->execute();
		} catch(Exception $e) {
			var_dump($e);
		}
		return $statement->fetchAll();
	}











}

?>
