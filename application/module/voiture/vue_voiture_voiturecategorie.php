<?php if (isset($_SESSION["cat_id"])) {?>
		<h2>choisissez Votre type de voiture<?php echo $_SESSION["cat_libelle"]?>Categorie Choisis </h2>
	<h2>Ma voiture préférée</h2>
 	<?php  } else { ?>
	<h2 class="text-center">MA VOITURE</h2>
	<?php } ?>

    <p><a class="btn btn-primary" href="<?=hlien("voiture","edit","id",0)?>">Faire une nouvelle location </a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>				
			<th>Id</th>
			<th>Immatriculation</th>
			<th>Catégorie</th>
			<th>Localisation</th>			
			<th>Modifier</th>
			<th>Supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $result as $row) { 
			extract($row); ?>
		<tr>
			<td><?=mhe($row['voi_id'])?></td>
			<td><?=mhe($row['voi_immatriculation'])?></td>
			<td><?=mhe($row['voi_categorie'])?></td>
			<td><?=mhe($row['voi_localisation'])?></td>
			
			<td><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimer">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>



	
     
    <div class="modal fade" id="supprimer" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
     
                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer mon compte</h5>
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
                    <a class="btn btn-danger" href="<?=hlien("location","del","id",$row["loc_id"])?>">Oui,supprimer</a>                   
                </div>
     
            </div>
        </div>
    </div>