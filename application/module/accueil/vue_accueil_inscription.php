<div class="text-center border border-3 border-danger p-5">
<?= $message ?>
<h1>Inscription</h1>
<form method="post" onsubmit="return verif()">
<p><input type="hidden" name="cli_id" value="<?= $cli_id ?>"></p>

    <p><label class="form-label" for='cli_nom'>Votre nom</label>
    <input class="form-control" type='text' name='cli_nom' id='cli_nom' <?=mhe($cli_nom)?> required></p>

    <p><label class="form-label" for='cli_prenom'> Votre prenom</label>
    <input class="form-control" type='text' name='cli_prenom' id='cli_prenom' <?=mhe($cli_prenom)?> required></p>

    <p><label class="form-label" for='cli_login'> Votre login</label>
    <input class="form-control" type='text' name='cli_login' id='cli_login' <?=mhe($cli_login)?> required></p>

    <p><label class="form-label" for='cli_mdp'>Mot de passe</label>
    <input class="form-control" type='password' name='cli_mdp' id='cli_mdp' <?=mhe($cli_mdp)?> required></p>

    <p><label class="form-label" for="cli_mdp2">Confirmez votre mot de passe</label>
    <input class="form-control" type="password" name="cli_mdp2" id="cli_mdp2" <?=mhe($cli_mdp2)?> required></p>

    <p><label class="form-label" for='cli_adresse'>Votre adresse</label>
    <input class="form-control" type='text' name='cli_adresse' id='cli_adresse' <?=mhe($cli_adresse)?> required></p>

    <p><label class="form-label" for='cli_email'>Votre email</label>
    <input class="form-control" type='email' name='cli_email' id='cli_email' <?=mhe($cli_email)?> required></p>

    <p><label class="form-label" for='cli_telephone'>Votre telephone</label>
    <input class="form-control" type='tel' name='cli_telephone' id='cli_telephone' <?=mhe($cli_telephone)?> required></p>
    
    <p> <input class="btn btn-success mt-5 form-control" type="submit" name="btSubmit" value="Valider" /></p>
</div>
    
</form>
<script>
    function verif() {
        let obj = document.getElementById("cli_mdp");
        let obj2 = document.getElementById("cli_mdp2");
        if (obj.value == obj2.value)
            return true;
        else {
            alert("erreur de confirmation du mot de passe");
            return false;
        }
    }
</script>