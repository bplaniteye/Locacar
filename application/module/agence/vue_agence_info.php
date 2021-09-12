<h3 class="text-center mb-5"> Informations de l'agence</h3>


	<div class=" row border border-3 text-white">
			<?php
		foreach ( $result as $row) { 
			extract($row); ?>
                	<div class="col">
                    	<img src="../www/_images/agence.jpg" class="" alt="...">
					</div>

					<div class="col bg-danger pt-5">
						<p>Ville : <?=mhe($row['age_ville'])?></p>
						<p>Département : <?=mhe($row['age_departement'])?></p>
					</div>

					<div class="col bg-dark pt-5">
					<p>Adresse : <?=mhe($row['age_adresse']) ?></p>
					<p>Téléphone : <?=mhe($row['age_telephone']) ?></p>
					</div>	

                    <div class="col bg-danger pt-5">							
						<p><?=mhe($row['age_info']) ?></p>						
					</div>                
             				
		<?php } ?>			
	</div>