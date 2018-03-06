<?php
	$title = "Quizz";
	require "views/header.php";
	require "inc/bdd.php";
	if(isset($_SESSION["etudiant"])){
		$groupe_etudiants = $bdd->prepare("SELECT * from etudiant_groupe where id_etudiant = ?");
		$groupe_etudiants->execute([$_SESSION["etudiant"]->id]);
		if($groupe_etudiants->rowCount() < 1){
			require 'views/EchecQuizz.view.php';
		}

		else {
			 require "views/quizz.view.php";
		}

		}
		else{
			require "views/NoQuizz.view.php";
		}
	