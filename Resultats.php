<?php 
	$title = "Resultats";
	require "views/header.php";
	require "inc/bdd.php";
	if(isset($_SESSION["etudiant"])){
		$resultats = $bdd->prepare("SELECT * FROM resultat where id_etudiant = ?");
		$resultats->execute([$_SESSION["etudiant"]->id]);
		
		require  'views/Resultats.view.php';
		
	}