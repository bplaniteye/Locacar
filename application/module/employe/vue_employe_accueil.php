   <div class=" text-center"">  
        <img src=" ../www/_images/logo.png" alt="" style="width: 250px;">
      <h3>Outil de gestion de Locacar</h3>
   </div>
   <div class="text-center mt-5">
      <h6>Consulter les informations de le base de données</h6>
   </div>

   <div class="text-center mt-5 columns" >

      <?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
         <div>
            <a class="btn btn-dark btn-lg text-white" href='<?= hlien("employe", "index") ?>'>Employés</a>
         </div>

         <div>
            <a class="btn btn-dark btn-lg text-white" href="<?= hlien("database", "creer") ?>">Créer BDD</a>
         </div>

         <div>
            <a class="btn btn-dark btn-lg text-white" href='<?= hlien("database", "dataset") ?>'>Jeu de données</a>
         </div>
      <?php } ?>

      <?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Gestionnaire") { ?>
         <div>
            <a class='btn btn-dark btn-lg text-white' href='<?= hlien("employe", "monagence") ?>'>Mon agence</a>
         </div>

         <div>
            <a class='btn btn-dark btn-lg text-white' href='<?= hlien("client", "edit") ?>'>Enregistrer un nouveau client</a>
         </div>

         <div>
            <a class='btn btn-dark btn-lg text-white' href='<?= hlien("location", "edit") ?>'>Location pour un client</a>
         </div>

         <div>
            <a class='btn btn-dark btn-lg text-white' href='<?= hlien("voiture", "reception") ?>'>Réception d'une voiture</a>
         </div>
      <?php } ?>

      <div>
         <a class="btn btn-dark btn-lg text-white" href='<?= hlien("accessoire", "index") ?>'>Accessoires</a>
      </div>

      <div>
         <a class="btn btn-dark btn-lg text-white" href='<?= hlien("agence", "index") ?>'>Agences</a>
      </div>

      <div>
         <a class="btn btn-dark btn-lg text-white" href='<?= hlien("categorie", "index") ?>'>Catégories de voitures</a>
      </div>

      <div>
         <a class="btn btn-dark btn-lg text-white" href='<?= hlien("client", "index") ?>'>Clients</a>
      </div>

      <div>
         <a class="btn btn-dark btn-lg text-white" href='<?= hlien("forfait", "index") ?>'>Forfaits</a>
      </div>

      <div>
         <a class="btn btn-dark btn-lg text-white" href='<?= hlien("location", "index") ?>'>Locations</a>
      </div>

      <div>
      <div class="border bg-danger p-2 d-inline">
      <i class="fas fa-euro-sign"></i>
         </div>
         <button class="btn btn-dark btn-lg border text-white d-inline">
         <a class="text-white" href='<?= hlien("tarification", "index") ?>'>  Tarification</a>
         </button>        
      </div>

      <div>
         <div class="border bg-danger p-2 d-inline">
         <i class="far fa-clock"></i>
         </div>
         <button class="btn btn-dark btn-lg border text-white d-inline">
         <a  href='<?= hlien("tranche", "index") ?>'> Tranches horaires</a>
         </button>
      </div>

      <div>
         <div class="border bg-danger p-2 d-inline">
            <i class="fas fa-car-side"></i>
         </div>
         <button class="btn btn-dark btn-lg border d-inline">
            <a class="link-danger" href='<?= hlien("voiture", "index") ?>'>Voitures</a>
         </button>
      </div>
   </div>



   ////////////
   
   <div>
         <div class="border bg-danger p-2 d-inline">
         
         </div>
         <button class="btn btn-dark btn-lg border text-white d-inline">
         
         </button>
      </div>