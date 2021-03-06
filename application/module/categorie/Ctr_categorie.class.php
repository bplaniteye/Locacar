<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_categorie extends Ctr_controleur {

    public function __construct($action) 
	{
        parent::__construct("categorie", $action);        
        $a = "a_$action";
        $this->$a();
    }

	function a_index() 
	{
		$u=new Categorie();
		$result=$u->findAll();
		require $this->gabarit;
	}
	
	//$_GET["id"] : id de l'enregistrement
	function a_edit() 
	{
		if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") 
		{
			if (isset($_POST["btSubmit"])) {
				$u=new Categorie();
				$u->chargerDepuisTableau($_POST);
				$u->sauver();
				header("location:" . hlien("categorie", "index"));
			} else {				
				$id = isset($_GET["id"]) ? $_GET["id"] : 0;
				$u=new Categorie($id);
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
				$u=new Categorie();
				$u->supprimer($_GET["id"]);
			}
			header("location:" . hlien("categorie", "index"));			
		}	
	}
	
	function a_voitures() 
	{		
		$result = Categorie::findVoiture($_GET["cat_id"]);
		require $this->gabarit;		
	}








}

?>