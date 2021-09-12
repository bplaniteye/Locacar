<nav class="navbar  navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<div class="navbar-brand">
		<a href="index.php"><img src="_images/logo.png" width="100" alt="Retour à l'accueil" title="Retour à l'accueil"></a>		
		</div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			
                <!-- Client -->
                <?php if (isset($_SESSION["cli_id"])) { ?>
                    <div class="btn-group m-3 dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" id="mesOptions">
                            <span class="sr-only"> <?php echo $_SESSION["cli_prenom"] . " " . $_SESSION["cli_nom"]; ?></span>
                        </button>
                        <ul class="dropdown-menu bg-primary" aria-labbeledby="mesOptions">
                            <li class="dropdown-item">
                                <a class="nav-link" href="<?= hlien("client", "edit", "id", $_SESSION["cli_id"]) ?>">Modifier mes informations personnelles</a>
                            </li>
                            <li class="dropdown-item"><a class="nav-link" href="<?= hlien("accueil", "deconnexion") ?>">Déconnexion</a></li>
                        </ul>
                    </div> 
                    <a class="nav-link" href="<?= hlien("client", "info") ?>">Info</a> 
                    <a class="nav-link" href="<?= hlien("accueil", "deconnexion") ?>"><i class="fas fa-power-off"></i>                


                    <!-- Admin -->
                <?php  } else if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
                    <div class="btn-group m-3 dropdown">
                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" id="mesOptions">
                            <span class="sr-only"> <?php echo $_SESSION["emp_profil"] . " : " . $_SESSION["emp_prenom"] . " " . $_SESSION["emp_nom"]; ?></span>
                        </button>
                        <ul class="dropdown-menu bg-danger text-white" aria-labbeledby="mesOptions">
                            <li class="dropdown-item">
                            <a class="nav-link" href="<?= hlien("employe", "edit", "id", $_SESSION["emp_id"]) ?>">Modifier mes informations personnelles</a>
                            </li>
                            <li class="dropdown-item">
                            <a class="nav-link" href="<?= hlien("accueil", "deconnexion") ?>">Déconnexion</a>
                            </li>
                        </ul>
                    </div>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("employe", "accueil") ?>'>Locacar</a></li>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("accessoire", "index") ?>'>Accessoires</a></li>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("agence", "index") ?>'>Agences</a></li>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("categorie", "index") ?>'>Catégories de voitures</a></li>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("client", "index") ?>'>Clients</a></li>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("employe", "index") ?>'>Employés</a></li>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("forfait", "index") ?>'>Forfaits</a></li>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("location", "index") ?>'>Locations</a></li>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("tarification", "index") ?>'>Tarification</a></li>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("tranche", "index") ?>'>Tranches</a></li>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("voiture", "index") ?>'>Voitures</a></li>
                    <a class="nav-link" href="<?= hlien("accueil", "deconnexion") ?>"><i class="fas fa-power-off"></i>
                 

                    <div class="btn-group m-3 dropdown bg-dark">
                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" id="modeDev">
                            <span class="sr-only">Mode développeur</span>
                        </button>
                        <ul class="dropdown-menu" aria-labbeledby="modeDev">                        
                            <li class="dropdown-item"><a class="nav-link" href="<?= hlien("database", "creer") ?>">Créer BDD</a></li>
                            <li class="dropdown-item"><a class="nav-link" href='<?= hlien("database", "dataset") ?>'>Jeu de données</a></li>
                        </ul>
                    </div>


                    <!-- SRC -->
                <?php } else if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "SRC") { ?>
                    <div class="btn-group m-3 dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" id="mesOptions">
                            <span class="sr-only"> <?php echo $_SESSION["emp_profil"] . " : " . $_SESSION["emp_prenom"] . " " . $_SESSION["emp_nom"]; ?></span>
                        </button>
                        <ul class="dropdown-menu bg-secondary" aria-labbeledby="mesOptions">
                        <li class="dropdown-item">
                            <a class="nav-link" href="<?= hlien("employe", "edit", "id", $_SESSION["emp_id"]) ?>">Modifier mes informations personnelles</a>
                            </li>
                            <li class="dropdown-item">
                            <a class="nav-link" href="<?= hlien("accueil", "deconnexion") ?>">Déconnexion</a>
                            </li>
                        </ul>
                    </div>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("employe", "accueil") ?>'>Locacar</a></li> 
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("client", "edit") ?>'>Enregistrer un nouveau client</a></li>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("location", "edit") ?>'>Location pour un client</a></li>                
                   

                    <!-- Gestionnaire -->
                <?php } else if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Gestionnaire") { ?>
                   <div class="btn-group m-3 dropdown">
                        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" id="mesOptions">
                            <span class="sr-only"> <?php echo $_SESSION["emp_profil"] . " : " . $_SESSION["emp_prenom"] . " " . $_SESSION["emp_nom"]; ?></span>
                        </button>
                        <ul class="dropdown-menu bg-success" aria-labbeledby="mesOptions">
                        <li class="dropdown-item">
                            <a class="nav-link" href="<?= hlien("employe", "edit", "id", $_SESSION["emp_id"]) ?>">Modifier mes informations personnelles</a>
                            </li>
                            <li class="dropdown-item">
                            <a class="nav-link" href="<?= hlien("accueil", "deconnexion") ?>"><i class="fas fa-power-off"></i></a>
                            </li>
                        </ul>
                    </div>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("employe", "accueil") ?>'>Locacar</a></li> 
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("employe", "monagence") ?>'>Mon agence</a></li>                   
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("client", "edit") ?>'>Enregistrer un nouveau client</a></li>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("location", "edit") ?>'>Location pour un client</a></li>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("voiture", "reception") ?>'>Réception d'une voiture</a></li>
                   
                   

                    <!-- Anonyme -->
                <?php } else if (!isset($_SESSION["cli_id"]) or !isset($_SESSION["emp_id"])) { ?>
                    <li class="nav-item"><a class='nav-link' href='<?= hlien("accueil", "inscription") ?>'>Inscription</a></li>
                    <li class="nav-item"><a class="nav-link" href='<?= hlien("accueil", "authentification") ?>'>Authentification</a></li>
                    <li class="nav-item"><a class="nav-link" href='<?= hlien("accueil", "connexion") ?>'>Connexion Employés</a></li>
                 
                <?php } ?>
            </ul>
        </div>
    </div>
    </div>
</nav>