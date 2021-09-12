<div class="text-center">
    <h2>Modifier les informations personnelles</h2>
    <form method="post" action="<?= hlien("employe", "edit") ?>">
        <input type="hidden" name="emp_id" id="emp_id" value="<?= $id ?>" />
        <div class='form-group'>
            <label for='emp_nom' class="form-label">Nom</label>
            <input id='emp_nom' name='emp_nom' type='text' size='50' value='<?= mhe($emp_nom) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='emp_prenom' class="form-label">Prénom</label>
            <input id='emp_prenom' name='emp_prenom' type='text' size='50' value='<?= mhe($emp_prenom) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='emp_login' class="form-label">Login</label>
            <input id='emp_login' name='emp_login' type='text' size='50' value='<?= mhe($emp_login) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='emp_mdp' class="form-label">Mot de passe</label>
            <input id='emp_mdp' name='emp_mdp' type='password' size='50' value='<?= mhe($emp_mdp) ?>' class='form-control' />
        </div>

        <div <?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Gestionnaire" or $_SESSION["emp_profil"] == "SRC") { ?> hidden <?php } ?>>
        <div class='form-group'>
                <label for='emp_profil' class="form-label">Profil</label>
                <select name='emp_profil' id='emp_profil' type='checkbox' class="form-select">
                    <option>Gestionnaire</option>
                    <option>SRC</option>
                    <option>Admin</option>
                </select>
            </div>

            <div class='form-group mt-5'>
                <label for='emp_agence' class="form-label">Agence</label>
                <select name='emp_agence' id='emp_agence' class="form-select">
                    <?= HTMLselect("select age_id,age_ville from agence order by age_ville", "age_id", "age_ville", $emp_agence) ?>
                </select>
            </div>          
        </div>       

        <input class="btn btn-success mt-5 form-control" type="submit" name="btSubmit" value="Valider" />
    </form>
</div>