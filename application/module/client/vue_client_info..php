<h3 class="text-center mb-5">Informations du client</h3>


	<div class=" row border border-3 text-white">
			<?php
		foreach ( $result as $row) { 
			extract($row); ?>
                	<div class="col">
                    	<img src="../www/_images/agence.jpg" alt="...">
					</div>

					<div class="col bg-danger pt-5">
                        <p>Login : <?=mhe($row['cli_login'])?></p>
						<p>Nom : <?=mhe($row['cli_nom'])?></p>
						<p>Prénom : <?=mhe($row['age_prenom'])?></p>
					</div>

					<div class="col bg-dark pt-5">
                    <p>Email : <?=mhe($row['cli_email']) ?></p>
					<p>Adresse : <?=mhe($row['cli_adresse']) ?></p>
					<p>Téléphone : <?=mhe($row['cli_telephone']) ?></p>
					</div>	

                              
             				
		<?php } ?>			
	</div>