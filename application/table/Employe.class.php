<?php
/**
Classe créé par le générateur.
*/
class Employe extends Table {
	public function __construct($id=0) {
		parent::__construct("employe", "emp_id",$id);
	}


	static public function findByLogin($login) {
		$sql="select * from employe where emp_login=:login";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":login",$login, PDO::PARAM_STR);
		try {
			$statement->execute();
		} catch(Exception $e) {
			var_dump($e);
		}
		return $statement->fetch();
	}

	static public function findAgence($emp_id) 
	{
		$sql="select * from employe,agence where emp_agence=age_id and emp_id=:emp_id";		
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":emp_id",$emp_id,PDO::PARAM_INT);
		try {
			$statement->execute();
		} catch(Exception $e) {
			var_dump($e);
		}
		return $statement->fetchAll();
	}








}
?>
