<?php
/**
Classe créé par le générateur.
*/
class Location extends Table 
{
	public function __construct($id=0) 
	{
		parent::__construct("location", "loc_id",$id);
	}

	static public function findByClient($id) 
	{
		$sql="select * from client,location,forfait,accessoire where loc_client=cli_id and for_location=loc_id and for_accessoire=acc_id and cli_id=:id";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":id",$id,PDO::PARAM_INT);
		try {
			$statement->execute();
		} catch(Exception $e) {
			var_dump($e);
		}
		return $statement->fetchAll();
	}

	
	static public function afficheInfo() 
	{
		$sql="select * 
		from location,voiture,agence as depart, agence as arrivee,client 
		where loc_voiture=voi_id
		and loc_agencecedepart=depart.age_id
		and loc_agencearrivee=arrivee.age_id
		and loc_client=cli_id";
		$statement = self::$link->prepare($sql);		
		try {
			$statement->execute();
		} catch(Exception $e) {
			var_dump($e);
		}
		return $statement->fetchAll();
	}

		
	static public function factureHorsForfait() 
	{
		$sql="select loc_id, loc_debut, loc_fin, timestampdiff(hour,loc_debut,loc_fin) as duree , tra_id, cat_libelle, tar_prix, timestampdiff(hour,loc_debut,loc_fin) * tar_prix as montant
		from location, tarification, tranche, categorie, voiture
		where loc_voiture=voi_id and 
		voi_categorie=cat_id and 
		tar_categorie=cat_id and 
		tar_tranche=tra_id and 
		timestampdiff(hour,loc_debut,loc_fin)>tra_dureemin and 
		timestampdiff(hour,loc_debut,loc_fin)<=tra_dureemax 
		group by loc_id ;";
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
