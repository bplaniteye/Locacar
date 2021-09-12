<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_client extends Ctr_controleur {

    public function __construct($action) {
        parent::__construct("client", $action);        
        $a = "a_$action";
        $this->$a();
    }

	function a_index() {
		$u=new Client();
		$result=$u->findAll();
		require $this->gabarit;
	}

	//$_GET["id"] : id de l'enregistrement
	function a_edit()
	{
		$message = "";
        extract($_POST);
			if (isset($btSubmit))
			{					
				if (Client::client_estUnique($cli_login)) 
				{
					$u = new Client();
					$cli_mdp = password_hash($cli_mdp, PASSWORD_DEFAULT);
					$u->chargerDepuisTableau($_POST);
					$u->sauver();				
						if (isset($_SESSION["cli_id"]))
							{
								header("location:" . hlien("client", "historique"));
							}							
						else if (isset($_SESSION["emp_id"]))
							{
								header("location:" . hlien("client", "index"));
							}					
				}
				else
				{
					$message = "Login déjà pris. Veuillez choisir un autre login.";
				}			
					
			} 
			else 
			{
				$id = isset($_GET["id"]) ? $_GET["id"] : 0;
				$u=new Client($id);
				extract($u->data);	
				require $this->gabarit;
			}
		
	}
	
		

	//param GET id 
	function a_del() {
		if (isset($_GET["id"])) {
			$u=new Client();
			$u->supprimer($_GET["id"]);
		}
		header("location:" . hlien("client", "index"));
	}

	
	function a_info() 
	{		
		$result=Client::findInfo($_GET["cli_id"]);		
		require $this->gabarit;		
	}

	function a_historique() 
	{		
		$u = new Location();
		$result = Location::findByClient($_SESSION["cli_id"]);
		require $this->gabarit;		
	}

	function a_rechercheclient() {    
        extract(array_map("mhe", $_GET));
        $data = Client::client_rechercher($chaine); 
		echo "CLIENTS";   
        foreach($data as $row) 
        {
            extract(array_map("mhe", $row));
            if (isset($_SESSION["emp_id"])) 
			{				
                echo "<li><a href='" . hlien("client","info","cli_id",$row["cli_id"]) . "'>$cli_prenom $cli_nom ($cli_login)</a></li>";                
            }
          
        }
    }





















}

?>