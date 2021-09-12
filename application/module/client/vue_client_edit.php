<div class="text-center">
    <form method="post" action="<?=hlien("client","edit")?>">
		<input type="hidden" name="cli_id" id="cli_id" value="<?= $id ?>" />

                        <div class='form-group'>
                            <label for='cli_nom' class='form-label'>Nom</label>
                            <input id='cli_nom' name='cli_nom' type='text' size='50' value='<?=mhe($cli_nom)?>'  class='form-control' />
                        </div>

                        <div class='form-group'>
                            <label for='cli_prenom' class='form-label'>Prénom</label>
                            <input id='cli_prenom' name='cli_prenom' type='text' size='50' value='<?=mhe($cli_prenom)?>'  class='form-control' />
                        </div>

                        <div class='form-group'>
                            <label for='cli_login' class='form-label'>Login</label>
                            <input id='cli_login' name='cli_login' type='text' size='50' value='<?=mhe($cli_login)?>'  class='form-control' />
                        </div>

                        <div class='form-group'>
                            <label for='cli_mdp' class='form-label'>Mot de passe</label>
                            <input id='cli_mdp' name='cli_mdp' type='password' size='50' value='<?=mhe($cli_mdp)?>'  class='form-control' />
                        </div>
                        <div class='form-group' class='form-label'>
                            <label for='cli_adresse'>Adresse</label>
                            <input id='cli_adresse' name='cli_adresse' type='text' size='50' value='<?=mhe($cli_adresse)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cli_email' class='form-label'>Email</label>
                            <input id='cli_email' name='cli_email' type='email' size='50' value='<?=mhe($cli_email)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cli_telephone' class='form-label'>Téléphone</label>
                            <input id='cli_telephone' name='cli_telephone' type='number' size='50' value='<?=mhe($cli_telephone)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success mt-5" type="submit" name="btSubmit" value="Valider" />
	</form>              
</div>