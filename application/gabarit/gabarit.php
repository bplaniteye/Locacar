<?php require "../application/config/strings.php" ?>

<!DOCTYPE html>
<html>

<head>
	<?php require "../application/gabarit/inc_head.php" ?>
</head>

<body class="container">

	<!-- ENTETE DE PAGE -->
	<?php require "../application/gabarit/inc_entete.php" ?>

	<div style="margin-top: 150px;">

		<!-- ZONE DE RECHERCHE -->
		<div>
			<span class="d-inline btn btn-danger border radius-50"><i class="fas fa-search"></i></span>
			<input type="text" id="chercher" class=" d-inline border border-1  border-danger" size="100" 

			<?php
			// RECHERCHE PROFIL ADMIN
				if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?> 
				placeholder="<?= $label_admin_recherche; ?>" 
				
			<?php																											 // RECHERCHE PROFIL SRC
				} else if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "SRC") { ?> 
				placeholder="  <?= $label_src_recherche; ?>" 
				
			<?php																											
			// RECHERCHE PROFIL GESTIONBNAIRE
				} else if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Gestionnaire") { ?> 
				placeholder="<?= $label_gestionnaire_recherche; ?>"
				
			<?php																											
			// RECHERCHE PROFIL CLIENT ET VISITEURS ANONYMES
				} else if (!isset($_SESSION["emp_id"])) { ?> 
				placeholder="  <?= $label_client_recherche; ?>" <?php } ?>>

		</div>

		<!-- ZONE DE RESULTATS DE RECHERCHE -->
		<div class="row">
			<div id="divreponseagence" class="col"></div>
			<div id="divreponseclient" class="col" <?php if (!isset($_SESSION["emp_id"])) { ?> hidden <?php } ?>></div>
		</div>
	</div>

	<!-- AFFICHAGE DU CONTENU -->
	<div style="margin-top: 100px;">
		<?php require $this->vue; ?>
	</div>

	<!-- PIED DE PAGE -->
	<?php require "../application/gabarit/inc_pied.php"; ?>
</body>

</html>

<script src="_js/rechercheajax.class.js"></script>
<script>
	// FONCTION : RECHERCHE D'AGENCE
	let rechercheagence = new RechercheAjax(chercher, 2, "<?= hlien('agence', 'rechercheagence') ?>", divreponseagence);

	// FONCTION : RECHERCHE DE CLIENT
	let rechercheclient = new RechercheAjax(chercher, 2, "<?= hlien('client', 'rechercheclient') ?>", divreponseclient);
</script>