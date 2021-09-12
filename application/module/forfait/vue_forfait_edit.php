<div class="text-center">
<form method="post" action="<?=hlien("forfait","edit")?>">
		<input type="hidden" name="for_id" id="for_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='for_location' class="form-label">Location</label>
                            <input id='for_location' name='for_location' type='text' size='50' value='<?=mhe($for_location)?>'  class='form-control' />
                        </div>

                        <div class='form-group mt-5'>
        <label for='for_accessoire' class="form-label">Accessoire </label>
        <select name='for_accessoire' id='for_accessoire' class="form-select">
        <?= HTMLselect("select acc_id, acc_libelle from accessoire order by acc_id ", "acc_id", "acc_libelle", $for_accessoire) ?>
        </select>
    </div> 
        
		<input class="btn btn-success mt-5" type="submit" name="btSubmit" value="Enregistrer" />
	</form>           
    </div>