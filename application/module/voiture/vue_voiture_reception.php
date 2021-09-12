<div>
<a class="btn btn-primary" href="<?=hlien("voiture","index")?>">Retour</a>
</div>

<div class="text-center">
<h2>Réception d'une voiture</h2>
  
        <form method="post" action="<?= hlien("voiture", "reception") ?>">

            <input type="hidden" name="voi_id" id="voi_id" value="<?= $id ?>" />

            <div class='form-group'>
                <label for='voi_immatriculation' class="form-label">Immatriculation</label>
                <input id='voi_immatriculation' name='voi_immatriculation' type='text' size='50' value='<?= mhe($voi_immatriculation) ?>' class='form-control'/>
            </div>

            <div class='form-group mt-5 mb-5'>
                <label for='voi_marque' class="form-label">Marque</label>
                <select name='voi_marque' id='voi_marque' class="form-select" ?>>
                <?= HTMLselect("select distinct voi_marque from voiture order by voi_marque", "voi_id", "voi_marque", $voi_marque) ?>
                </select>
            </div>

            <div class='form-group mt-5 mb-5'>
                <label for='voi_categorie' class="form-label">Type de voiture </label>
                <select name='voi_categorie' id='voi_categorie' class="form-select" >
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
 
</div>