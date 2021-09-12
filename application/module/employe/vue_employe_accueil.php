   <div class=" text-center"">  
        <img src="../www/_images/logo.png" alt="" style="width: 250px;">  
        <h3>Outil de gestion de Locacar</h3>
    </div>
    <div class="text-center mt-5">
       <h6>Consulter les informations de le base de données</h6>
    </div>

    <div class="container text-center mt-5">
       <a class="btn btn-dark btn-lg text-white" href='<?= hlien("accessoire", "index") ?>'>Accessoires</a>
       <a class="btn btn-dark btn-lg text-white" href='<?= hlien("agence", "index") ?>'>Agences</a>
       <a class="btn btn-dark btn-lg text-white" href='<?= hlien("categorie", "index") ?>'>Catégories de voitures</a>
       <a class="btn btn-dark btn-lg text-white" href='<?= hlien("client", "index") ?>'>Clients</a>
       <?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
       <a class="btn btn-dark btn-lg text-white" href='<?= hlien("employe", "index") ?>'>Employés</a>
       <?php } ?>
       <a class="btn btn-dark btn-lg text-white" href='<?= hlien("forfait", "index") ?>'>Forfaits</a>
       <a class="btn btn-dark btn-lg text-white" href='<?= hlien("location", "index") ?>'>Locations</a>
       <a class="btn btn-dark btn-lg text-white" href='<?= hlien("tarification", "index") ?>'>Tarification</a>
       <a class="btn btn-dark btn-lg text-white" href='<?= hlien("tranche", "index") ?>'>Tranches horaires</a>
       <a class="btn btn-dark btn-lg text-white" href='<?= hlien("voiture", "index") ?>'>Voitures</a>
    </div>