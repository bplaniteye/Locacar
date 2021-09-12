<!DOCTYPE html>
<html>

<head>
	<?php require "../application/gabarit/inc_head.php" ?>
</head>

<body class="container">
	<div class="container">
		<?php require "../application/gabarit/inc_entete.php" ?>

		<div style="margin-top: 150px;">
			<input type="text" id="chercher" class="form-control" 
			<?php if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Admin") { ?>
			placeholder="Recherche Agence:ville,département / Voiture:catégorie / Client / Employé"
			<?php } else if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "SRC") { ?>
			placeholder="Recherche Agence:ville,département / Voiture:catégorie / Client"
			<?php } else if (isset($_SESSION["emp_id"]) and $_SESSION["emp_profil"] == "Gestionnaire") { ?>
			placeholder="Recherche Agence:ville,département / Voiture:catégorie / Client"
			<?php } else if (!isset($_SESSION["emp_id"])) { ?>
			placeholder="Recherche Agence:ville,département"
			<?php } ?>>		
		

			<div class="row">
			<div id="divreponseagence" class="col"></div>				
			<div id="divreponseclient" class="col" <?php if (!isset($_SESSION["emp_id"])) { ?> hidden <?php } ?>></div>			
			</div>			
		</div>

		<div style="margin-top: 100px;">
			<?php require $this->vue; ?>
		</div>

	
	</div>
	<?php require "../application/gabarit/inc_pied.php"; ?>
</body>

</html>

<script src="_js/rechercheajax.class.js"></script>
<script>
	let rechercheagence = new RechercheAjax(chercher, 2, "<?= hlien('agence', 'rechercheagence') ?>", divreponseagence);
	let rechercheclient = new RechercheAjax(chercher, 2, "<?= hlien('client', 'rechercheclient') ?>", divreponseclient);
</script>