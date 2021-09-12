<?php
/**
Classe créé par le générateur.
*/
class Client extends Table 
{
	public function __construct($id=0) 
	{
		parent::__construct("client", "cli_id",$id);
	}

	static public function findByLogin($login) 
	{
		$sql="select * from client where cli_login=:login";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":login",$login, PDO::PARAM_STR);
		try 
		{
			$statement->execute();
		} 
		catch(Exception $e) 
		{
			var_dump($e);
		}
		return $statement->fetch();
	}

	
	public static function client_estUnique($login)
    {
        //le login doit être unique dans la table client
     $sql = "select * from client where cli_login=:login";
        $statement = self::$link->prepare($sql);
        $statement->bindValue(":login",$login, PDO::PARAM_STR);
        try 
		{
            $statement->execute();
        } 
		catch (Exception $e) 
		{
            var_dump($e);
        }
        $statement = $statement->fetch();

        if ($statement != 0)
			return false;
         else
			return true; 
           
	}

	
	static public function findInfo($cli_id) 
	{
		$sql="select * from client where cli_id=:cli_id";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":cli_id",$cli_id, PDO::PARAM_STR);
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

	public static function client_rechercher($chaine) {	
		$sql="select * from client where cli_nom  like :chaine or cli_prenom like :chaine or cli_login like :chaine ";
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