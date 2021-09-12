<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_employe extends Ctr_controleur {

    public function __construct($action) {
        parent::__construct("employe", $action);        
        $a = "a_$action";
        $this->$a();
    }

	function a_index() {
		$u=new Employe();
		$result=$u->findAll();
		require $this->gabarit;
	}

	function a_accueil() 
	{				
		require $this->gabarit;
	}

	function a_edit() 
	{
		if (isset($_SESSION["emp_id"]) /*and $_SESSION["emp_profil"] == "Admin"*/)
		{
				if (isset($_POST["btSubmit"])) 
			{
				$u=new Employe();
				$u->chargerDepuisTableau($_POST);
				$u->sauver();
				header("location:" . hlien("employe", "index"));
			} 
			else 
			{				
				$id = isset($_GET["id"]) ? $_GET["id"] : 0;
				$u=new Employe($id);
				extract($u->data);	
				require $this->gabarit;
			}

		}
		
	}
	

	//param GET id 
	function a_del() {
		if (isset($_GET["id"])) 
		{
			$u=new Employe();
			$u->supprimer($_GET["id"]);
		}
		header("location:" . hlien("employe", "index"));
	}

	function a_monagence() 
	{
		if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Gestionnaire") 
		{
			$u = new Employe();
			$result = Employe::findAgence($_SESSION["emp_id"]);
			$u = new Agence();
			$result = Agence::findLocation($_SESSION["age_id"]);
			require $this->gabarit;
		}		
	}










}

?>