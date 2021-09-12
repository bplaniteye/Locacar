<?php if (isset($_SESSION["cli_id"])) {?>
	<h2>Bienvenu.e <?php echo $_SESSION["cli_prenom"]." ".$_SESSION["cli_nom"]?> dans votre espace personnel</h2>
	<h2>Mes locations</h2>
 	<?php  } else { ?>
	<h2 class="text-center">LOCATIONS</h2>
	<?php } ?>

    <p><a class="btn btn-primary" href="<?=hlien("location","edit","id",0)?>">Faire une nouvelle location </a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>				
			<th>Id</th>
			<th>Date et heure de départ</th>
			<th>Date et heure d'arrivée</th>
			<th>Type de réservation</th>
			<th>Statut de la réservation</th>
			<th>Agence de départ</th>
			<th>Agence d'arrivée</th>
			<th>Client</th>
			<th>Voiture</th>
			<th>Modifier</th>
			<th>Supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>			
			<td><?=mhe($row['loc_id'])?></td>
			<td><?=mhe($row['loc_debut'])?></td>
			<td><?=mhe($row['loc_fin'])?></td>
			<td><?=mhe($row['loc_type'])?></td>
			<td><?=mhe($row['loc_statut'])?></td>
			<td><?=mhe($row['loc_agencedepart'])?></td>
			<td><?=mhe($row['loc_agencearrivee'])?></td>
			<td><?=mhe($row['loc_client'])?></td>
			<td><?=mhe($row['loc_voiture'])?></td><td><a class="btn btn-warning" href="<?=hlien("location","edit","id",$row["loc_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimer" onclick="setId(<?=$row['loc_id']?>)">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>	
     
    <div class="modal fade" id="supprimer" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
     
                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
     
                <!-- Body -->
                <div class="modal-body">
                    <p class="m-0">Etes-vous sûr de vous ?</p>
                </div>
     
                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button class="btn btn-danger" onclick="supprimer()">Oui,supprimer</button>                   
                </div>     
            </div>
        </div>
    </div>

	<script>
		let loc_id;
		function setId(id) 
		{
			loc_id=id;
		}
		function supprimer() 
		{
			document.location.href="<?=hlien("location","del")?>&id=" + loc_id;
		}
	</script>
