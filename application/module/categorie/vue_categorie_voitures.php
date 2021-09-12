			<div class="row">
			<?php
		foreach ( $result as $row) { 
			extract($row); ?>
				<div class="col">
                	<div class="card" style="width: 18rem;">
                    	<img src="../www/_images/car2.jpg" class="card-img-top" alt="...">
						<div class="card-title">
						<p>Catégorie : <?=mhe($row['cat_libelle'])?></p>
						</div>
					
                    	<div class="card-body">
						<p>Référence : <?=mhe($row['voi_id'])?></p>
						<p>Immatriculation : <?=mhe($row['voi_immatriculation'])?></p>
						<p>Agence de localisation : <?=mhe($row['age_ville'])?></p>
						<p>Département : <?=mhe($row['age_departement'])?></p>
						</div>
                    </div>
                </div>
					
		<?php } ?>			
			</div>
		





	