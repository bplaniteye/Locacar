    <h2 class="text-center">Les catégories de voitures</h2>
    <?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
    	<p><a class="btn btn-primary" href="<?= hlien("categorie", "edit", "id", 0) ?>">Nouvelle catégorie</a></p>
    <?php } ?>
    <table class="table table-striped table-bordered table-hover">
    	<thead>
    		<tr>

    			<th>Id</th>
    			<th>Catégorie</th>
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
    				<td><?= mhe($row['cat_id']) ?></td>
    				<td><?= mhe($row['cat_libelle']) ?></td>
    				<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
    				<td><a class="btn btn-warning" href="<?= hlien("categorie", "edit", "id", $row["cat_id"]) ?>">Modifier</a></td>
    				<td><a class="btn btn-danger" href="<?= hlien("categorie", "del", "id", $row["cat_id"]) ?>">Supprimer</a></td>
    				<?php } ?>
    			</tr>
    		<?php } ?>
    	</tbody>
    </table>