<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_agence extends Ctr_controleur {

    public function __construct($action) {
        parent::__construct("agence", $action);        
        $a = "a_$action";
        $this->$a();
    }

	function a_index() {
		$u=new Agence();
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
				$u=new Agence();
				$u->chargerDepuisTableau($_POST);
				$u->sauver();
				header("location:" . hlien("agence" , "index"));
			} else {				
				$id = isset($_GET["id"]) ? $_GET["id"] : 0;
				$u=new Agence($id);
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
				$u=new Agence();
				$u->supprimer($_GET["id"]);
			}
		header("location:" . hlien("agence", "index"));
		}
		
	}

	function a_info() 
	{		
		$result=Agence::findInfo($_GET["age_id"]);		
		require $this->gabarit;		
	}

	function a_rechercheagence() {    
        extract(array_map("mhe", $_GET));
        $data = Agence::agence_rechercher($chaine); 
		echo "AGENCES";   
        foreach($data as $row) 
        {
            extract(array_map("mhe", $row));			
            echo "<li><a href='" . hlien("agence","info","age_id",$row["age_id"]) . "'>$age_ville ($age_departement)</a></li>";           
        }
    }




}

?>