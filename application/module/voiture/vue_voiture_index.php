    <h2 class="text-center">Nos voitures</h2>
	<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
    <p><a class="btn btn-primary" href="<?=hlien("voiture","edit","id",0)?>">Nouvelle voiture</a></p>
	<?php }?>
	<table class="table table-striped table-bordered table-hover mt-5">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Immatriculation</th>
			<th>Catégorie</th>
			<th>Localisation</th>
			<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
			<th>Modifier</th>
			<th>Supprimer</th>
			<?php }?>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['voi_id'])?></td>
			<td><?=mhe($row['voi_immatriculation'])?></td>
			<td><?=mhe($row['cat_libelle'])?></td>
			<td><?=mhe($row['age_ville'])?></td>
			<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
				
			<td><a class="btn btn-warning" href="<?=hlien("voiture","edit","id",$row["voi_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("voiture","del","id",$row["voi_id"])?>">Supprimer</a></td>
			<?php }?>
			</tr>
		<?php } ?>
		</tbody>
	</table>
