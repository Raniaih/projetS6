<?php
$title = "Liste des Groupes";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["prof"])){
		$groupes = $bdd->prepare("SELECT * FROM groupe where id_prof=?");
		$groupes->execute([$_SESSION["prof"]->id]);
		require 'views/ListeGroupe.view.php';
	}
