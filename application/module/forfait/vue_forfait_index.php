    <h2 class="text-center">Forfaits (Accessoires ajoutés aux locations)</h2>	
	<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
	<p><a class="btn btn-primary" href="<?=hlien("forfait","edit","id",0)?>">Nouveau forfait</a></p>
	<?php } ?>
   
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>				
			<th>Id</th>
			<th>Location</th>
			<th>Accessoire</th>
			<?php if (isset($_SESSION["emp_id"])) { ?>
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
			
			<td><?=mhe($row['for_id'])?></td>
			<td><?=mhe($row['for_location'])?></td>
			<td><?=mhe($row['for_accessoire'])?></td>
			
		
		<?php if (isset($_SESSION["emp_id"])) { ?>
			<td><a class="btn btn-warning" href="<?=hlien("forfait","edit","id",$row["for_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("forfait","del","id",$row["for_id"])?>">Supprimer</a></td>
		<?php } ?>
		</tr>
		<?php } ?>
		</tbody>
	</table>


