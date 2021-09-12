<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_location extends Ctr_controleur {

    public function __construct($action) {
        parent::__construct("location", $action);        
        $a = "a_$action";
        $this->$a();
    }

	function a_index() {
		$u=new Location();
		$result=$u->findAll();
		require $this->gabarit;
	}
	
	//$_GET["id"] : id de l'enregistrement
    /*
	function a_edit() {
		if (isset($_POST["btSubmit"])) {
			$u=new Location();
			$u->chargerDepuisTableau($_POST);
			$u->sauver();
			header("location:" . hlien("location", "index"));
		} else {				
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$u=new Location($id);
			extract($u->data);	
			require $this->gabarit;
		}
	}
    */
	

	//param GET id 
	function a_del() {
		if (isset($_GET["id"])) {
			$u=new Location();
			$u->supprimer($_GET["id"]);
		}
		header("location:" . hlien("location"));
	}

	
	function a_factureHorsForfait() {
		$u=new Location();
		$result=$u->factureHorsForfait();
		require $this->gabarit;
	}

	public function a_reservation()
    {
        if (isset($_POST["btSubmit"])) {
            if (isset($_SESSION["cli_id"])) {
                $u = new Location();
                $_POST["loc_debut"] = $_POST["loc_dated"] . " " . $_POST["loc_hd"];
                $_POST["loc_fin"] = $_POST["loc_datef"] . " " . $_POST["loc_hf"];
                $u->chargerDepuisTableau($_POST);
                $u->sauver();
                $a = new Forfait();

                //boucle pour chaque accessoire pour traiter les cases cochées
                foreach ($_POST["option"] as $acc_id) {
                    $a->data["for_accessoire"] = $acc_id;
                }
                $a->data["for_location"] = $u->data["loc_id"];
                $a->data["for_id"] = 0;
                $a->sauver();
            }
            header("location:" . hlien("client", "historique"));
        } else {
            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
            $u = new Location($id);
            extract($u->data);
            $loc_dated = date("Y-m-d");
            $loc_hd = date("H:i:s");
            $loc_datef = date("Y-m-d");
            $loc_hf = date("H:i:s");
            $listeaccessoire = Accessoire::findAccessoire();
            require $this->gabarit;
        }
    }

    function a_edit()
	{
		if (isset($_POST["btSubmit"])) {
			$u = new Location();
			$_POST["loc_debut"]= $_POST["loc_dated"] . " " . $_POST["loc_hd"];
			$_POST["loc_fin"]= $_POST["loc_datef"] . " " . $_POST["loc_hf"];
			$u->chargerDepuisTableau($_POST);
			extract($u->data);
			$u->sauver();
			header("location:" . hlien("location", "index"));
		} else {
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$u = new Location($id);
			extract($u->data);
			$loc_dated= date("Y-m-d");
			$loc_hd= date("H:i:s");
			$loc_datef= date("Y-m-d");
			$loc_hf= date("H:i:s");
			require $this->gabarit;
		}
	}








}

?>