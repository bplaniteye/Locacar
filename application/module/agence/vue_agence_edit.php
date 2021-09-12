<div class="text-center">
<h2 class="text-center">Agence</h2>
<form method="post" action="<?=hlien("agence","edit")?>">
	<input type="hidden" name="age_id" id="age_id" value="<?= $id ?>" />
            <div class='form-group'>
                <label for='age_ville' class="form-label">Ville</label>
                <input id='age_ville' name='age_ville' type='text' size='50' value='<?=mhe($age_ville)?>'  class='form-control' />
            </div>

            <div class='form-group'>
                <label for='age_departement' class="form-label">Département</label>
                <input id='age_departement' name='age_departement' type='text' size='50' value='<?=mhe($age_departement)?>'  class='form-control' />
            </div>

            <div class='form-group'>
                <label for='age_telephone' class="form-label">Téléphone</label>
                <input id='age_telephone' name='age_telephone' type='tel' size='50' value='<?=mhe($age_telephone)?>'  class='form-control' />
            </div>

            <div class='form-group'>
                <label for='age_adresse' class="form-label">Adresse</label>
                <input id='age_adresse' name='age_adresse' type='text' size='50' value='<?=mhe($age_adresse)?>'  class='form-control' />
            </div>

            <div class='form-group'>
                <label for='age_info' class="form-label">Informations</label>
                <input id='age_info' name='age_info' type='text' size='50' value='<?=mhe($age_info)?>'  class='form-control' />
            </div>

		<input class="btn btn-success mt-5 form-control" type="submit" name="btSubmit" value="Valider" />
	</form>              


</div>      