    <h2 class="text-center">Tranches horaires</h2>
	<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
    <p><a class="btn btn-primary" href="<?=hlien("tranche","edit","id",0)?>">Nouveau tranche</a></p>
	<?php }?>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Durée minimum</th>
			<th>Durée maximum</th>
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
			
			<td><?=mhe($row['tra_id'])?></td>
			<td><?=mhe($row['tra_dureemin'])?></td>
			<td><?=mhe($row['tra_dureemax'])?></td>
			<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
			<td><a class="btn btn-warning" href="<?=hlien("tranche","edit","id",$row["tra_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("tranche","del","id",$row["tra_id"])?>">Supprimer</a></td>
			<?php }?>
		</tr>
		<?php } ?>
		</tbody>
	</table>

