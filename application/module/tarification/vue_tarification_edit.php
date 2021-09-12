<div>
<div>
<a class="btn btn-primary" href="<?=hlien("tarification","index")?>">Retour</a>
</div>
</div>

<div class="text-center">
<h2>Tarification</h2>
<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?> 
        <form method="post" action="<?=hlien("tarification","edit")?>">
		<input type="hidden" name="tar_id" id="tar_id" value="<?= $id ?>" />

            <div class='form-group mt-5 mb-5'>
                <label for='tar_categorie' class="form-label">Type de voiture </label>
                <select name='tar_categorie' id='tar_categorie' class="form-select">
                <?= HTMLselect("select * from categorie order by cat_libelle", "cat_id", "cat_libelle", $tar_id) ?>
                </select>
            </div>

            <div class='form-group mt-5 mb-5'>
                <label for='tar_tranche' class="form-label">Tranche horaire</label>
                <select name='tar_tranche' id='tar_tranche' class="form-select">              
                <?= HTMLselect("select tra_id,concat(tra_dureemin,'-',tra_dureemax) as label from tranche order by tra_id", "tar_id", "label", $tar_id) ?>                  
                </select>
            </div>

                        <div class='form-group'>
                            <label for='tar_prix'>Prix</label>
                            <input id='tar_prix' name='tar_prix' type='number' size='50' value='<?=mhe($tar_prix)?>'  class='form-control' />
                        </div>

		<input class="btn btn-success form-control mt-5" type="submit" name="btSubmit" value="Valider" />
	</form>  
    <?php } ?>            
</div>
