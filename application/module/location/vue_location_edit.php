<form method="post" action="<?= hlien("location", "edit") ?>">

    <!-- Id de la location -->
    <div class='form-group mt-5'>
        <input type="hidden" name="loc_id" id="loc_id" value="<?= $id ?>" />
    </div>
    <div class="row mt-5">
        <!-- Client -->
        <div class='form-group' <?php if (isset($_SESSION["cli_id"])) { ?> hidden <?php } ?>>
            <label for='loc_client' class="form-label">Client</label>
            <select class="form-select" name='loc_client' id='loc_client'>
                <?= HTMLselect("select cli_id,cli_login from client order by cli_id", "cli_id", "cli_login", $loc_client) ?>
            </select>

            
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <!-- Date et heure de début -->
            <input type="hidden" name="loc_debut" id="loc_debut" value="<?= $loc_debut ?>" />
            <div class='form-group mt-5'>
                <label for='loc_dated' class="form-label">Date de départ</label>
                <input id='loc_dated' name='loc_dated' type='date' size='50' max='<?= mhe($loc_datef) ?>' value='<?= mhe($loc_dated) ?>' class='form-control' />
            </div>
            <div class='form-group mt-5'>
                    <label for='loc_hd' class="form-label">Heure de départ</label>
                    <input id='loc_hd' name='loc_hd' type='time' size='50' value='<?= mhe($loc_hd) ?>' class='form-control' />
            </div> 
        </div>

        <div class="col">
            <!-- Date et heure de fin -->
            <input type="hidden" name="loc_fin" id="loc_fin" value="<?= $loc_fin ?>" />
            <div class='form-group mt-5'>
                    <label for='loc_datef' class="form-label">Date de fin</label>
                    <input id='loc_datef' name='loc_datef' type='date' size='50' min='<?= mhe($loc_dated) ?>' value='<?= mhe($loc_datef) ?>' class='form-control' />
            </div>
            <div class='form-group mt-5'>
                        <label for='loc_hf' class="form-label">Heure de fin</label>
                        <input id='loc_hf' name='loc_hf' type='time' size='50' value='<?= mhe($loc_hf) ?>' class='form-control' />
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col">
            <!-- Agence de départ -->
            <div class='form-group mt-5'>
                <label for='loc_agencedepart' class="form-label">Agence de départ : </label>
                <select name='loc_agencedepart' id='loc_agencedepart' class="form-select">
                    <?= HTMLselect("select age_id,age_ville from agence order by age_ville", "age_id", "age_ville", $loc_agencedepart) ?>
                </select>
            </div>
        </div>

        <div class="col">
            <!-- Agence d'arrivée -->
            <div class='form-group mt-5'>
                <label for='loc_agencearrivee' class="form-label">Agence d'arrivée </label>
                <select name='loc_agencearrivee' id='loc_agencearrivee' class="form-select">
                    <?= HTMLselect("select age_id,age_ville from agence order by age_ville", "age_id", "age_ville", $loc_agencearrivee) ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <!-- Type de location -->
            <label for='loc_type' class="form-label mt-5">Type de location</label>
            <div class='row form-group'>
                <div class="col">
                    <input type="radio" id="loc_type" name="loc_type" value="Site web" <?php if (isset($_SESSION["cli_id"])) { ?> checked <?php } else if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "SRC" or $_SESSION["emp_profil"] == "Gestioonaire") { ?> disabled <?php } ?>>
                    <label for="loc_type">Site web</label>
                </div>
                <div class="col">
                    <input type="radio" id="loc_type" name="loc_type" value="Agence" <?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Gestionnaire") { ?> checked <?php } else if (isset($_SESSION["cli_id"]) or $_SESSION["emp_id"] and $_SESSION["emp_profil"] == "SRC") { ?> disabled <?php } ?>>
                    <label for="loc_type">Agence</label>
                </div>
                <div class="col">
                    <input type="radio" id="loc_type" name="loc_type" value="SRC" <?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "SRC") { ?> checked <?php } else if (isset($_SESSION["cli_id"]) or $_SESSION["emp_id"] and $_SESSION["emp_profil"] == "Gestionnaire") { ?> disabled <?php } ?>>
                    <label for="loc_type">SRC</label>
                </div>
            </div>
        </div>

        <div class="col">
            <!-- Statut de la location -->
            <label for='loc_statut' class="form-label mt-5">Statut de la location</label>
            <div class='row form-group'>
                <div class="col">
                    <input type="radio" id="loc_statut" name="loc_statut" value="Initialisée" <?php if (isset($_SESSION["cli_id"])) { ?> checked <?php } ?>>
                    <label for="loc_statut">Initialisée</label>
                </div>
                <div class="col">
                    <input type="radio" id="loc_statut" name="loc_statut" value="Validée" <?php if (isset($_SESSION["cli_id"])) { ?> disabled <?php } ?>>
                    <label for="loc_statut">Validée</label>
                </div>
                <div class="col">
                    <input type="radio" id="loc_statut" name="loc_statut" value="Annulée" <?php if (isset($_SESSION["cli_id"])) { ?> disabled <?php } ?>>
                    <label for="loc_statut">Annulée</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <!-- Voiture -->
            <div class='form-group mt-5'>
                <label for='loc_voiture' class="form-label">Voiture </label>
                <select name='loc_voiture' id='loc_voiture' class="form-select">
                    <?= HTMLselect("select voi_id,voi_immatriculation from voiture order by voi_immatriculation", "voi_id", "voi_immatriculation", $loc_voiture) ?>
                </select>
            </div>
        </div>

        <div class="col">

            <!-- Accessoire -->
            <div class='form-group mt-5'>
                <label for='for_accessoire' class="form-label">Accessoire </label>
                <select name='for_accessoire' id='for_accessoire' class="form-select">
                    <?= HTMLselect("select acc_id, acc_libelle from accessoire order by acc_id ", "acc_id", "acc_libelle", $for_accessoire) ?>
                </select>
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <input class="btn btn-success" type="submit" name="btSubmit" value="Valider" />
    </div>

</form>