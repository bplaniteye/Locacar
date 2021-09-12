<div class="border border-3 border-danger p-5 text-center">
        
        <h1>Connexion</h1>
        <?= $message ?>
        <form method="post">
            <p>
                <label for="emp_login" class="form-label">Login</label>
                <input type="text" name="emp_login" id="emp_login" value="<?=$emp_login?>" class="form-control" required>
            </p>
            <p>
                <label for="emp_mdp" class="form-label">Mot de passe</label>
                <input type="password" name="emp_mdp" id="emp_mdp" class="form-control" required>
            </p>
            <p>
                <input type="submit" name="btSubmit" class="btn btn-success form-control mt-5" value="Valider">
            </p>
        </form>
    </div>
