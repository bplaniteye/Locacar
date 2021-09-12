    <h2>employe</h2>
	<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
    <p><a class="btn btn-primary" href="<?=hlien("employe","edit","id",0)?>">Nouvel employé</a></p>
	<?php }?>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Login</th>			
			<th>Profil</th>
			<th>Agence</th>
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
			
			<td><?=mhe($row['emp_id'])?></td>
			<td><?=mhe($row['emp_nom'])?></td>
			<td><?=mhe($row['emp_prenom'])?></td>
			<td><?=mhe($row['emp_login'])?></td>			
			<td><?=mhe($row['emp_profil'])?></td>
			<td><?=mhe($row['emp_agence'])?></td>
			<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
			<td><a class="btn btn-warning" href="<?=hlien("employe","edit","id",$row["emp_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("employe","del","id",$row["emp_id"])?>">Supprimer</a></td>
			<?php }?>
		</tr>
		<?php } ?>
		</tbody>
			</table>