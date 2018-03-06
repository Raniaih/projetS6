<?php
$title = "Etudiants";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["prof"]) && isset($_GET["id"])){
		$id_groupe = intval($_GET["id"]);
		$groupe = $bdd->prepare("SELECT * FROM groupe where id = ? and id_prof=?");
		$groupe->execute([$id_groupe, $_SESSION["prof"]->id]);
		$groupe = $groupe->fetch();
		if($groupe){
		
			
			$groupe_theme = $bdd->prepare("SELECT * from groupe_theme where id_groupe = ?");
			$groupe_theme->execute([$id_groupe]);

			require 'views/ResultatGroupe.view.php';
		}
	}