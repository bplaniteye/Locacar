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
			<!-- RECHERCHE PROFIL ADMIN -->
			<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
				<label for="chercher" class="form-label"> <span class="btn btn-success border radius-25"><i class="fas fa-search"></i></span> <?= $label_admin_recherche; ?> </label>

				<!-- RECHERCHE PROFIL SRC -->
			<?php } else if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "SRC") { ?>
				<label for="chercher" class="form-label"> <span class="btn btn-success border radius-25"><i class="fas fa-search"></i></span> <?= $label_src_recherche; ?> </label>

				<!-- RECHERCHE PROFIL GESTIONNAIRE -->
			<?php } else if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Gestionnaire") { ?>
				<label for="chercher" class="form-label"> <span class="btn btn-success border radius-25"><i class="fas fa-search"></i></span> <?= $label_gestionnaire_recherche; ?> </label>

				<!-- RECHERCHE PROFILS CLIENT ET ANONYME -->
			<?php } else if (!isset($_SESSION["emp_id"])) { ?>
				<label for="chercher" class="form-label"> <span class="btn btn-success border radius-25"><i class="fas fa-search"></i></span> <?= $label_client_recherche; ?> </label>
			<?php } ?>

			<input type="text" id="chercher" class="form-control bg-dark text-white">
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