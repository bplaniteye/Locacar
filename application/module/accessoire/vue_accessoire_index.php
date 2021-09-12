    <h2 class="text-center mt-5 mb- 5 text-white">Accessoires</h2>
    <?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
    	<p class="mb-5 "><a class="btn btn-primary" href="<?= hlien("accessoire", "edit", "id", 0) ?>">Nouvel accessoire</a></p>
    <?php } ?>
    <table class="table table-striped table-bordered table-hover text-white">
    	<thead>
    		<tr class="text-white">
    			<th>Id</th>
    			<th>Libellé</th>
    			<th>Prix</th>
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
    				<td><?= mhe($row['acc_id']) ?></td>
    				<td><?= mhe($row['acc_libelle']) ?></td>
    				<td><?= mhe($row['acc_prix']) ?></td>
    				<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
    				<td><a class="btn btn-warning" href="<?= hlien("accessoire", "edit", "id", $row["acc_id"]) ?>">Modifier</a></td>
    				<td><a class="btn btn-danger" href="<?= hlien("accessoire", "del", "id", $row["acc_id"]) ?>">Supprimer</a></td>
    				<?php } ?>
    			</tr>
    		<?php } ?>
    	</tbody>
    </table>