<?php

	//fabrique un lien en passant les parametres un par un à savoir :
	// module, action, [cle, valeur]...
	function hlien() {
		$args = func_get_args();
		
		if (count($args)==1)
			return "index.php?m=" . $args[0] . "&a=index";
		
		$nb=count($args)/2;
		if (!is_int($nb)) {
			echo "ERREUR NOMBRE D'ARGUMENTS !!";
			exit;
		}
		$m=$args[0];
		$a=$args[1];
		
		if (!isset($args[2]))
			return "index.php?m=$m&a=$a";
		else {		
			$para=array();
			for( $i=1;$i<$nb;$i++)
				$para[]=$args[2*$i] . "=" . $args[2*$i+1];
			$s=implode("&",$para);
			return "index.php?m=$m&a=$a&$s";
		}
	}

	/**
	Autoload : 
	- les controleurs sont dans le répertoire "module", le fichier est préfixé par "Ctr_"
	- les classes Table sont dans le répertoire "_table"
	*/
	function monAutoLoad($classname) {
		if ("Ctr_" == substr($classname, 0, 4)) {
			$rep = str_replace("Ctr_", "", $classname);
			require_once "../application/module/$rep/" . $classname . ".class.php";
		} else {
			if (file_exists("../application/table/" . $classname . ".class.php"))
				require_once "../application/table/" . $classname . ".class.php";
		}	
	}

	/*
	Affiche un tableau PHP à 2 dimensions sous la forme d'une table HTML
	*/
	function afficheTableHTML($data) 
	{
		$fin=false;
		echo "<table>";
		foreach($data as $cleLigne => $ligne) {
			//affiche des entete de colonnes
			if (!$fin) {
				echo "<tr>";
				echo "<th></th>";
				foreach($ligne as $cle=>$valeur) {
					echo "<th>$cle</th>";
				}
				echo "</tr>";	
				$fin=true;
			}
			
			//affichage du tableau
			echo "<tr>";
			echo "<th>$cleLigne</th>";
			foreach($ligne as $cle=>$valeur) {
				echo "<td>$valeur</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	//si user non authentifié redirection vers index
	function isAuth() 
	{
		if (!isset($_SESSION["id"]))
			header("location:index.php");
	}

	//anti sql injection
	function mres($s) {
		return mysqli_real_escape_string(Table::$link,$s);
	}

	/**
	Traitement des chaines anti XSS avant affichage dans une page HTML.
	*/
	function mhe($x) {
		return htmlentities($x, ENT_QUOTES, "utf-8");
	}

	function HTMLselect($sql,$pk,$label,$id) 
	{
		global $link;

		$resultat = $link->query($sql);
		$s="";
		foreach($resultat as $tab) {
			if ($tab[$pk]==$id)
				$sel= " selected ";
			else 
				$sel="";
			
			$s=$s . "<option $sel value='$tab[$pk]'>$tab[$label]</option>";		
		}
		return $s;
	}

		function heure()
		{
			$hour = 8;
			while($hour <= 20)
			{
				$min = 0;
				while($min <= 45)
				{
					echo "<option>" .($hour < 10)?"0":"" . $hour . ':' . ($min < 10)?"0":"" .$min ."</option>";
					$min += 15;
				}
				$hour++;
			}

		}
/*
		function heure_minute()
		{
			for($i = 0; $i < 24; $i++)
			{
				<option value="<?= $i; ?>"><?= $i % 12 ? $i % 12 : 12 ?>:00 <?= $i >= 12 ? 'pm' : 'am' ?></option>;
			}				
			
		}

*/

?>