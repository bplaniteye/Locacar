<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_tarification extends Ctr_controleur {

    public function __construct($action) {
        parent::__construct("tarification", $action);        
        $a = "a_$action";
        $this->$a();
    }

	function a_index() {
		$u=new Tarification();
		$result=$u->findAll();
		require $this->gabarit;
	}
	
	//$_GET["id"] : id de l'enregistrement
	function a_edit() 
	{
		if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") 
		{
			if (isset($_POST["btSubmit"]))
			{
				$u=new Tarification();
				$u->chargerDepuisTableau($_POST);
				$u->sauver();
				header("location:" . hlien("tarification", "index"));
			} 
			else
			{				
				$id = isset($_GET["id"]) ? $_GET["id"] : 0;
				$u=new Tarification($id);
				extract($u->data);	
				require $this->gabarit;
			}
		}
	
	}
	

	//param GET id 
	function a_del() 
	{
		if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") 
		{
			if (isset($_GET["id"]))
			{
				$u=new Tarification();
				$u->supprimer($_GET["id"]);
			}
			header("location:" . hlien("tarification"));
		}
	}
	
}

?>