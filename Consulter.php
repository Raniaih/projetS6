<?php
$title = "Etudiants";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["prof"]) && isset($_GET["id"])){
		$id = intval($_GET["id"]);
		$resultats = $bdd->prepare("SELECT * FROM resultat where id_etudiant = ?");
		$resultats->execute([$id]);
		require 'views/consulter.view.php';
	}