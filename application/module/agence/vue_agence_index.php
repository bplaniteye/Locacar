    <h2 class="text-center">Nos agences</h2>
    <?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
    	<p><a class="btn btn-primary" href="<?= hlien("agence", "edit", "id", 0) ?>">Nouvelle agence</a></p>
    <?php } ?>
    <table class="table table-striped table-bordered table-hover">
    	<thead>
    		<tr>
    			<th>Id</th>
    			<th>Ville</th>
    			<th>Département</th>
				<th>Téléphone</th>
    			<th>Adresse</th>
    			<th>Informations</th>
    			<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
    			<th>Modifier</th>
    			<th>Supprimer</th>
    			<?php } ?>
    		</tr>
    	</thead>
    	<tbody>
    		<?php
			foreach ($result as $row) {
				extract($row); ?>
    			<tr>

    				<td><?= mhe($row['age_id']) ?></td>
    				<td><?= mhe($row['age_ville']) ?></td>
    				<td><?= mhe($row['age_departement']) ?></td>
					<td><?= mhe($row['age_telephone']) ?></td>
    				<td><?= mhe($row['age_adresse']) ?></td>
    				<td><?= mhe($row['age_info']) ?></td>
    				<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
    				<td><a class="btn btn-warning" href="<?= hlien("agence", "edit", "id", $row["age_id"]) ?>">Modifier</a></td>
    				<td><a class="btn btn-danger" href="<?= hlien("agence", "del", "id", $row["age_id"]) ?>">Supprimer</a></td>
    				<?php } ?>
    			</tr>
    		<?php } ?>
    	</tbody>
    </table>