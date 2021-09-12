<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_client extends Ctr_controleur {   
	
	//$_GET["id"] : id de l'enregistrement
	function a_edit() {
		if (isset($_POST["btSubmit"])) {
			$u=new Client();
			$u->chargerDepuisTableau($_POST);
			$u->sauver();
			header("location:" . hlien("client", "index"));
		} 
        else 
        {				
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$u=new Client($id);
			extract($u->data);	
			require $this->gabarit;
		}
	}	

	//$_GET["id"] : id de l'enregistrement
	function a_edit()
	{
		$message = "";
		//si client ou admin
		if (isset($_SESSION["emp_id"]) && $_SESSION["emp_profil"] == "Admin" || isset($_SESSION["cli_id"])) 
		{
			//si réception du formulaire
			if (isset($_POST["btSubmit"])) 
			{
				
				//vérification si le login est unique
				if (!Client::client_estUnique($_POST["cli_login"])) 
				{
					header("location:" . hlien("client", "edit"));
					$message = "Erreur de modification du login. Veuillez recommencer.";
				}
				$u = new Client();
				$_POST["cli_mdp"] = password_hash($_POST["cli_mdp"], PASSWORD_DEFAULT);
				$u->chargerDepuisTableau($_POST);
				$u->sauver();
				//si c'est le client même qui modifie alors redirection vers ces locations
				if (isset($_SESSION["cli_id"]))
					header("location:" . hlien("client", "historique"));
				else
					header("location:" . hlien("client", "index"));
			} else {
				$id = isset($_GET["id"]) ? $_GET["id"] : 0;
				if (isset($_SESSION["emp_id"]) && $_SESSION["emp_profil"] && "Admin") {
					$u = new Client($id);
					extract($u->data);
					//verification que le user connecté est bien celui qui modifie	
				} else if ($id > 0 && $id != $_SESSION["cli_id"]) {
					header("location:" . hlien("accueil", "index"));
					exit();
				}
				$u = new Client($id);
				extract($u->data);
				$message = "";
				require $this->gabarit;
			}
		} else
			header("location:" . hlien("accueil", "index"));
	}
	






	




















}

?>