<?php
/**
Classe créé par le générateur.
*/
class Accessoire extends Table {
	public function __construct($id=0) {
		parent::__construct("accessoire", "acc_id",$id);
	}

	public static function findAccessoire()
	{
		$sql="select * from accessoire order by acc_libelle";
		$result=self::$link->query($sql);
		return $result->fetchAll();	
	}
}
?>
