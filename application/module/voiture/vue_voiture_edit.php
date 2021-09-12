<div>
<a class="btn btn-primary" href="<?=hlien("voiture","index")?>">Retour</a>
</div>

<div class="text-center">
<h2>Voiture</h2>
    <?php if (isset($_SESSION["emp_id"]) /*and $_SESSION["emp_profil"] == "Admin"*/) { ?>
        <form method="post" action="<?= hlien("voiture", "edit") ?>">

            <input type="hidden" name="voi_id" id="voi_id" value="<?= $id ?>" />

            <div class='form-group'>
                <label for='voi_immatriculation' class="form-label">Immatriculation de la voiture</label>
                <input id='voi_immatriculation' name='voi_immatriculation' type='text' size='50' value='<?= mhe($voi_immatriculation) ?>' class='form-control'  <?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Gestionnaire") { ?> hidden <?php } ?>/>
            </div>

            <div class='form-group mt-5 mb-5'>
                <label for='voi_categorie' class="form-label">Type de voiture </label>
                <select name='voi_categorie' id='voi_categorie' class="form-select" <?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Gestionnaire") { ?> hidden <?php } ?>>
                <?= HTMLselect("select * from categorie order by cat_libelle", "cat_id", "cat_libelle", $cat_id) ?>
                </select>
            </div>

            <div class='form-group mt-5 mb-5'>
                <label for='voi_localisation' class="form-label">Localisation de la voiture</label>
                <select name='voi_localisation' id='voi_localisation' class="form-select">
                <?= HTMLselect("select age_id,age_ville from agence order by age_ville", "age_id", "age_ville", $voi_localisation) ?>
                </select>
            </div>

            <input class="btn btn-success mt-5 form-control" type="submit" name="btSubmit" value="Valider" />
        </form>
    <?php } ?>
</div>