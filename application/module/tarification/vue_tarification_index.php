    <h2 class="text-center">Nos tarifs</h2>
	<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
		<p><a class="btn btn-primary" href="<?=hlien("tarification","edit","id",0)?>">Nouvelle tarification</a></p>
	<?php } ?>
    
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>				
			<th>Id</th>
			<th>Catégorie</th>
			<th>Tranche</th>
			<th>Prix</th>
			<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
			<th>Modifier</th>
			<th>Supprimer</th>
	<?php } ?>
			
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['tar_id'])?></td>
			<td><?=mhe($row['tar_categorie'])?></td>
			<td><?=mhe($row['tar_tranche'])?></td>
			<td><?=mhe($row['tar_prix'])?></td>
			
		
			<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
			<td><a class="btn btn-warning" href="<?=hlien("tarification","edit","id",$row["tar_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("tarification","del","id",$row["tar_id"])?>">Supprimer</a></td>
	<?php } ?>
		</tr>
		<?php } ?>
		</tbody>
	</table>