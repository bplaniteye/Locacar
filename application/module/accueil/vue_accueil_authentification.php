
    <div class="border border-3 border-danger border-radius-4 text-center p-5">
        
        <h1>Authentification</h1>
        <?= $message ?>
        <form method="post">
            <p>
                <label for="cli_login" class="form-label">Login</label>
                <input type="text" name="cli_login" id="cli_login" value="<?= $cli_login ?>" class="form-control" required>
            </p>
            <p>
                <label for="cli_mdp" class="form-label">Mot de passe</label>
                <input type="password" name="cli_mdp" id="cli_mdp" class="form-control" required>
            </p>
            <p>
                <input type="submit" name="btSubmit" class="btn btn-success form-control mt-5" value="Valider">
            </p>
        </form>
    </div>

    