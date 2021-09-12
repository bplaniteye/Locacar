<?php
class Ctr_accueil extends Ctr_controleur
{
    public function __construct($action)
    {
        parent::__construct("accueil", $action);
        $a = "a_$action";
        $this->$a();
    }

    public function a_index()
    {
        try {
            require $this->gabarit;
        } catch (Exception $e) {
            $_GET["erreur"] = $e;
            new Ctr_erreur("catch");
        }
    }

    function a_authentification()
    {
        $message = "";
        extract($_POST);
        if (isset($btSubmit))
            {
                if ($row = Client::findByLogin($cli_login)) 
                {
                    if (password_verify($cli_mdp, $row["cli_mdp"])) 
                    {             
                        $_SESSION["cli_id"] = $row["cli_id"];
                        $_SESSION["cli_login"] = $row["cli_login"];
                        $_SESSION["cli_nom"] = $row["cli_nom"];
                        $_SESSION["cli_prenom"] = $row["cli_prenom"];
                        header("location:" . hlien("client", "historique"));
                    } 
                    else
                    {
                        $message = "Erreur d'authentification. Veuillez recommencer.";
                    }
                
               
                }            
                else 
                {
                    $message = "Erreur d'authentification. Veuillez recommencer...";
                }               
            }
            else
            {
                $cli_login="";                             
            }            
        require $this->gabarit;
        
    }

    
    function a_connexion()
    {
        $message = ""; 
        extract($_POST);
        if (isset($btSubmit))
            {
                if ($row = Employe::findByLogin($emp_login))
                {
                    if (password_verify($emp_mdp, $row["emp_mdp"])) 
                    {                                
                        $_SESSION["emp_id"] = $row["emp_id"];
                        $_SESSION["emp_login"] = $row["emp_login"];
                        $_SESSION["emp_profil"] = $row["emp_profil"];
                        $_SESSION["emp_prenom"] = $row["emp_prenom"];
                        $_SESSION["emp_nom"] = $row["emp_nom"];                          
                        header("location:" . hlien("employe", "accueil"));                                              
                    }                             
                    else 
                    {
                        $message = "Erreur d'authentification. Veuillez recommencer.";
                    }
                }            
                else 
                {
                    $message = "Erreur d'authentification. Veuillez recommencer...";
                }               
            }
            else
            {
               $emp_login="";                
            }            
        require $this->gabarit;
        
    }

    function a_inscription()
    {
        $message = "";
        extract($_POST);
        if (isset($btSubmit)) {
            if (Client::client_estUnique($cli_login)) 
            {
                //cryptage du mot de passe
                $cli_mdp = password_hash($cli_mdp, PASSWORD_DEFAULT);
                //Enregistrement des données dans la base
                $u = new Client();
                $u->chargerDepuisTableau($_POST);
                $u->sauver();
                header("location:" . hlien("agence", "index"));
            } 
            else 
            {
                $message = "Erreur d''inscription. Veuillez recommencer.";
            }
        } 
        else 
        {
            $cli_id = 0;
            $cli_nom = "";
            $cli_prenom = "";
            $cli_login = "";
            $cli_mdp = "";
            $cli_mdp2 = "";
            $cli_adresse = "";
            $cli_email = "";
            $cli_telephone = "";
        }
        require $this->gabarit;
    }

    function a_deconnexion()
    {
    $_SESSION = [];
    session_destroy();
    header("location:" . hlien("accueil", "index"));
    }


    function a_ajax_chercher() {    
        extract(array_map("mhe", $_GET));
        $data = Agence::accueil_rechercher($chaine);    
        foreach($data as $row) 
        {
            extract(array_map("mhe", $row));
            //if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") 
            //{
                echo "<li><a href='" . hlien("agence","info","age_id",$row["age_id"]) . "'>$age_ville ($age_departement)</a></li>";
                echo "<li><a href='" . hlien("agence","index") . "'>$age_departement</a></li>";
           //}
          
        }
    }




}            
