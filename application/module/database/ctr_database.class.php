<?php
class Ctr_database extends Ctr_controleur
{

    public function __construct($action)
    {
        parent::__construct("database", $action);
        $a = "a_$action";
        $this->$a();
    }

    public function a_creer()
    {
        $sql = Database::creer("../document/creation_locacar.sql");
        require $this->gabarit;
    }

    public function a_dataset()
    {
        $nbagence = Database::genererAgence(20);           
        $nbclient = Database::genererClient(150);   
        $nbemploye = Database::genererEmploye(55);   
        $nbvoiture = Database::genererVoiture(200,20);   
        $nblocation = Database::genererLocation(200,20,200,150);   
        $nbforfait = Database::genererForfait(150,200);
           
        require $this->gabarit;
    }
}