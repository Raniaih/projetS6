<?php
$title = "Etudiants";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["prof"])){
		$etudiants = $bdd->query("SELECT * FROM etudiant");

		require 'views/Etudiants.view.php';
	}