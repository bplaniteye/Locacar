<?php
class Database
{
    static public function creer(string $sqlfile): string
    {
        $sql = file_get_contents($sqlfile);
        Table::$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, 0);
        Table::$link->exec($sql);
        return $sql;
    }
    // 1 - Création des agences     
    static public function genererAgence(int $nbagence)
    {
        require "../document/ville_departement.php";
        $sql = "insert into agence values ";
        $nbagence = 20;
        $data = [];       
            for ($i = 0; $i < $nbagence; $i++) 
            {
                $age_ville = $ville[$i];
                $age_departement = $departement[$i];                
                $n1 = mt_rand(1,9);              
                $n2 = mt_rand(0,9);
                $age_telephone = 0 . $n1 . $n2 . $n2 . $n2 . $n2. $n2 . $n2 . $n2 . $n2;
                $age_adresse = $adresse[$i];
                $age_info = "Ouvert du lundi à vendredi de 8h à 20h. Ouvert samedi et dimanche de 8h à 12h  ";
                $data[] = "(null, '$age_ville', '$age_departement','$age_telephone','$age_adresse','$age_info')";

            }      
        return Table::$link->exec($sql . implode(",", $data));
    }
    

    // 2 - Création des clients
    static public function genererClient(int $nbclient): int
    {
        require "../document/personnes.php";
        $sql = "insert into client values ";
        $data = [];
        for ($i = 1; $i <= $nbclient; $i++) {
            shuffle($noms);
            $cli_nom = $noms[0];
            shuffle($prenoms);
            $cli_prenom = $prenoms[0];           
            $cli_login = "client$i";
            $cli_mdp = password_hash("mdp$i", PASSWORD_DEFAULT);
            $cli_adresse = "$i rue des Clients 00001 Kebab-Les-Bains, France";
            $cli_email = "email" . $i . "@client.fr";
            $n1 = mt_rand(1,9);              
;           $n2 = mt_rand(0,9);
            $cli_telephone = 0 . $n1 . $n2 . $n2 . $n2 . $n2. $n2 . $n2 . $n2 . $n2;
            $data[] = "(null,'$cli_nom','$cli_prenom','$cli_login','$cli_mdp','$cli_adresse','$cli_email','$cli_telephone')";
        }
        return Table::$link->exec($sql . implode(",", $data));
    }

    // 3 - Création des employés
    static public function genererEmploye(int $nbemploye)
    {
        require "../document/personnes.php";
        $data = [];
        $sql = "insert into employe values";
        for ($i = 1; $i <= $nbemploye; $i++) {
            shuffle($noms);
            $emp_nom = $noms[0];
            shuffle($prenoms);
            $emp_prenom = $prenoms[0];   
            $emp_login = "employe$i";
            $emp_mdp = password_hash("mdp$i", PASSWORD_DEFAULT);
            $emp_profil = "";
            $data[] = "(null,'$emp_nom','$emp_prenom','$emp_login','$emp_mdp', '$emp_profil', null)";
        }
        Table::$link->exec($sql . implode(",", $data));

        for ($i = 1; $i <= 40; $i++) {
            $idagence = ceil($i / 2);
            $sql = "UPDATE employe SET emp_profil='Gestionnaire' , emp_agence=:idagence WHERE emp_id=$i";
            $statement = Table::$link->prepare($sql);
            $statement->bindValue(":idagence", $idagence, PDO::PARAM_INT);
            $statement->execute();
        }

        for ($i = 41; $i <= 50; $i++) {
            $sql = "UPDATE employe SET emp_profil='SRC' WHERE emp_id=$i";
            $statement = Table::$link->prepare($sql);
            $statement->execute();
        }

        for ($i = 51; $i <= 55; $i++) {
            $sql = "UPDATE employe SET emp_profil='Admin' WHERE emp_id=$i";
            $statement = Table::$link->prepare($sql);
            $statement->execute();
        }
    }

    // 4 - Création des voitures
    static public function genererVoiture(int $nbvoiture, int $nbagence)
    {
        $data = [];
        $marque = array("Toyota" , "Peugeot" , "Dacia" , "Citroen" , "Hyundai" , "Mitsubishi");
        $sql = "insert into voiture values ";
        for ($i = 1; $i <= $nbvoiture; $i++) {
            shuffle($marque);
            $voi_marque = $marque[0];
            $voi_immatriculation = "123 XYZ $i";
            $voi_categorie = mt_rand(1, 6);
            $voi_localisation = mt_rand(1, $nbagence);
            $data[] = "(null,'$voi_marque','$voi_immatriculation' , '$voi_categorie', '$voi_localisation')";
        }
        return Table::$link->exec($sql . implode(",", $data));
    }

    // 5 - Création des locations
    static public function genererLocation($nblocation, $nbagence, $nbvoiture, $nbclient)
    {
        $sql = "insert into location  values ";
        $data = [];
        $statut = array("Initialisée", "Validée", "Annulée");
        $type = array("SRC", "Site web", "Agence");
        for ($i = 1; $i <= $nblocation; $i++) 
        {
            $timestamp = time();
            $ts_debut = mktime(mt_rand(8, 20), 0, 0, mt_rand(1, 12), mt_rand(1, 30), 2019);
            $loc_debut = date("Y-m-d H:i:s", $ts_debut);
            $ts_fin = $ts_debut + 60 * 60 * 24 * mt_rand(1, 30);
            $loc_fin = date("Y-m-d H:i:s", $ts_fin);
            shuffle($type);
            $loc_type = $type[0];
            shuffle($statut);
            $loc_statut = $statut[0];
            $loc_agencedepart = mt_rand(1, $nbagence);
            $loc_agencearrivee = mt_rand(1, $nbagence);
            $loc_client = mt_rand(1,$nbclient);            
            $loc_voiture = $i;   
            $data[] = "(null,'$loc_debut','$loc_fin','$loc_type','$loc_statut','$loc_agencedepart','$loc_agencearrivee','$loc_client','$loc_voiture')";
        }
        return Table::$link->exec($sql . implode(",", $data));
    }

    // 6 - Création des forfaits
    
    static public function genererForfait(int $nbforfait, int $nblocation)
    {
        $data = [];
        $sql = "insert into forfait values ";
        for ($i = 1; $i <= $nbforfait; $i++) {
            $for_accessoire = mt_rand(1, 5);
            $for_location = mt_rand(1, $nblocation);
            $data[] = "(null,'$for_location' , '$for_accessoire')";
        }
        return Table::$link->exec($sql . implode(",", $data));
    }
    
}
