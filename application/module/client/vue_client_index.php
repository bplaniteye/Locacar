    <h2>client</h2>
    <?php if (isset($_SESSION["emp_id"])) { ?>
    	<p><a class="btn btn-primary" href="<?= hlien("client", "edit", "id", 0) ?>">Nouveau client</a></p>
    <?php } ?>
    <table class="table table-striped table-bordered table-hover">
    	<thead>
    		<tr>

    			<th>Id</th>
    			<th>Nom</th>
    			<th>Prenom</th>
    			<th>Login</th>    			
    			<th>Adresse</th>
    			<th>Email</th>
    			<th>Telephone</th>
    			<?php if (isset($_SESSION["emp_id"]))  { ?>
    				<th>modifier</th>
    				<th>supprimer</th>
    			<?php } ?>
    		</tr>
    	</thead>
    	<tbody>
    		<?php
			foreach ($result as $row) {
				extract($row); ?>
    			<tr>

    				<td><?= mhe($row['cli_id']) ?></td>
    				<td><?= mhe($row['cli_nom']) ?></td>
    				<td><?= mhe($row['cli_prenom']) ?></td>
    				<td><?= mhe($row['cli_login']) ?></td>    				
    				<td><?= mhe($row['cli_adresse']) ?></td>
    				<td><?= mhe($row['cli_email']) ?></td>
    				<td><?= mhe($row['cli_telephone']) ?></td>
    				<?php if (isset($_SESSION["emp_id"])) { ?>
    					<td><a class="btn btn-warning" href="<?= hlien("client", "edit", "id", $row["cli_id"]) ?>">Modifier</a></td>
    					<td><a class="btn btn-danger" href="<?= hlien("client", "del", "id", $row["cli_id"]) ?>">Supprimer</a></td>
    				<?php } ?>
    			</tr>
    		<?php } ?>
    	</tbody>
    </table>