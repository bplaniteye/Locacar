<div>
<a class="btn btn-primary" href="<?=hlien("tranche","index")?>">Retour</a>
</div>

<div class="text-center">
<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?> 
<form method="post" action="<?=hlien("tranche","edit")?>">
		<input type="hidden" name="tra_id" id="tra_id" value="<?= $id ?>" />
                        <div class='form-group'>
                            <label for='tra_dureemin'>Durée minimum</label>
                            <input id='tra_dureemin' name='tra_dureemin' type='text' size='50' value='<?=mhe($tra_dureemin)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='tra_dureemax'>Durée maximum</label>
                            <input id='tra_dureemax' name='tra_dureemax' type='text' size='50' value='<?=mhe($tra_dureemax)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success form-control" type="submit" name="btSubmit" value="Valider" />
	</form>   
    <?php } ?>  
</div>

         