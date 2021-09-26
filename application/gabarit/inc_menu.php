<nav class="navbar  navbar-expand-sm navbar-dark bg-dark">
    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <div class="navbar-brand">
                <a href="index.php"><img src="_images/logo.png" width="100" alt="Retour à l'accueil" title="Retour à l'accueil"></a>
            </div>

            <div class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- MENU CLIENT -->
                <?php if (isset($_SESSION["cli_id"])) { ?>

                    <button type="button" class="nav-item btn btn-primary border radius-25 m-2" title="Modifier mes informations personnelles">
                        <a class="nav-link" href="<?= hlien("client", "edit", "id", $_SESSION["cli_id"]) ?>"> <?php echo $_SESSION["cli_prenom"] . " " . $_SESSION["cli_nom"]; ?> </a>
                    </button>
                    <button type="button" class="nav-item btn btn-primary border radius-25 m-2">
                        <a class="nav-link" href="<?= hlien("client", "info") ?>">Info</a>
                    </button>
                    <button type="button" class="nav-item btn btn-primary border radius-25 m-2">
                        <a class="nav-link" href="<?= hlien("accueil", "deconnexion") ?>"><i class="fas fa-power-off"></i>
                    </button>

                    <!-- MENU ADMIN -->
                <?php  } else if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>

                    <button type="button" class=" nav-item btn btn-danger border radius-25 m-2" title="Modifier mes informations personnelles">
                        <a class="nav-link" href="<?= hlien("employe", "edit", "id", $_SESSION["emp_id"]) ?>"><?php echo $_SESSION["emp_profil"] . " : " . $_SESSION["emp_prenom"] . " " . $_SESSION["emp_nom"]; ?></a>
                    </button>

                    <button type="button" class="nav-item btn btn-danger border radius-25 m-2">
                        <a class='nav-link' href='<?= hlien("employe", "accueil") ?>'>Espace Employés</a>
                    </button>

                    <button type="button" class=" nav-item btn btn-danger border radius-25 m-2">
                        <a class="nav-link" href="<?= hlien("accueil", "deconnexion") ?>"><i class="fas fa-power-off"></i>
                    </button>

                    <!-- SRC -->
                <?php } else if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "SRC") { ?>

                    <button type="button" class=" nav-item btn btn-secondary border radius-25 m-2" title="Modifier mes informations personnelles">
                        <a class="nav-link" href="<?= hlien("employe", "edit", "id", $_SESSION["emp_id"]) ?>"><?php echo $_SESSION["emp_profil"] . " : " . $_SESSION["emp_prenom"] . " " . $_SESSION["emp_nom"]; ?></a>
                    </button>

                    <button class="nav-item btn-secondary radius-25 m-2 ">
                        <a class='nav-link' href='<?= hlien("employe", "accueil") ?>'>Espace Employés</a>
                    </button>

                    <button type="button" class=" nav-item btn btn-danger border radius-25 m-2">
                        <a class="nav-link" href="<?= hlien("accueil", "deconnexion") ?>"><i class="fas fa-power-off"></i>
                    </button>

                    <!-- MENU GESTIONNAIRE -->
                <?php } else if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Gestionnaire") { ?>

                    <button type="button" class=" nav-item btn btn-success border radius-25 m-2" title="Modifier mes informations personnelles">
                        <a class="nav-link" href="<?= hlien("employe", "edit", "id", $_SESSION["emp_id"]) ?>"><?php echo $_SESSION["emp_profil"] . " : " . $_SESSION["emp_prenom"] . " " . $_SESSION["emp_nom"]; ?></a>
                    </button>

                    <button class="nav-item btn-success radius-25 m-2 ">
                        <a class='nav-link' href='<?= hlien("employe", "accueil") ?>'>Espace Employés</a>
                    </button>

                    <button type="button" class=" nav-item btn btn-danger border radius-25 m-2">
                        <a class="nav-link" href="<?= hlien("accueil", "deconnexion") ?>"><i class="fas fa-power-off"></i>
                    </button>

                    <!-- MENU VISITEUR ANONYME -->
                <?php } else if (!isset($_SESSION["cli_id"]) or !isset($_SESSION["emp_id"])) { ?>
                    <button class="nav-item border radius-25 btn-danger m-2">
                        <a class='nav-link' href='<?= hlien("accueil", "inscription") ?>'>Inscription</a>
                    </button>
                    <button class="nav-item border radius-25 btn-danger m-2">
                        <a class="nav-link" href='<?= hlien("accueil", "authentification") ?>'>Authentification</a>
                    </button>
                    <button class="nav-item border radius-25 btn-danger m-2">
                        <a class="nav-link" href='<?= hlien("accueil", "connexion") ?>'>Connexion Employés</a>
                    </button>
                <?php } ?>
            </div>
        </div>

    
    
</nav>