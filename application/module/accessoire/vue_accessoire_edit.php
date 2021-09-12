<div class="text-center">
<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?> 
        <h2 class="text-center">Accessoire</h2>
        <form method="post" action="<?=hlien("accessoire","edit")?>">
	<input type="hidden" name="acc_id" id="acc_id" value="<?= $id ?>" />
            <div class='form-group'>
                    <label for='acc_libelle' class="form-label">Accessoire</label>
                    <input id='acc_libelle' name='acc_libelle' type='text' size='50' value='<?=mhe($acc_libelle)?>'  class='form-control' />
            </div>
            <div class='form-group'>
                    <label for='acc_prix' class="form-label">Prix</label>
                    <input id='acc_prix' name='acc_prix' type='number' size='50' value='<?=mhe($acc_prix)?>'  class='form-control' />
            </div>
	<input class="btn btn-success mt-5" type="submit" name="btSubmit" value="Enregistrer"/>
	</form>
        <?php } ?>
</div>       
  
    