<?php
$title = "Liste des Quizz";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["prof"])){
		$themes  = $bdd->prepare("SELECT * FROM theme where id_prof = ?");
		$themes->execute([$_SESSION["prof"]->id]);
		require 'views/ListeQuizz.view.php';
	}