<?php

	$title = "Integrer un groupe";
	
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["etudiant"])){

	$groupes = $bdd->query("SELECT * from groupe");
	$etudiant_groupes = $bdd->prepare("SELECT * FROM etudiant_groupe where id_etudiant = ?");
	$etudiant_groupes->execute([$_SESSION["etudiant"]->id]);
	

	require 'views/groupe.view.php';
}
else{
	$_SESSION["flash"]["danger"] = "Veuillez vous connecter ! ";
	header("location:/Quizz/Connexion.php");
}