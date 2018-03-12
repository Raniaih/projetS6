<?php

	require '../inc/bdd.php';
	session_start();
	if(isset($_SESSION["admin"]) && isset($_GET["id"]) && !empty($_GET["id"])){
		$id = intval($_GET["id"]);
		$professeur = $bdd->prepare("SELECT * FROM professeur where id = ?");
		$professeur->execute([$id]);
		$professeur = $professeur->fetch();
		if($professeur){
			$themes = $bdd->prepare("SELECT * FROM theme where id_prof = ?");
			$themes->execute([$professeur->id]);
			while($theme = $themes->fetch()){

		$questions = $bdd->prepare("SELECT * from question where id_theme=?");
		$questions->execute([$theme->id]);
		echo $questions->rowCount();
		while ($question = $questions->fetch()){
			
			$delReponse = $bdd->prepare("DELETE from reponses where id_question = ?");
			$delReponse->execute([$question->id]);
		}
		$delTheme_Groupe = $bdd->prepare("DELETE  from groupe_theme where id_theme = ?");
		$delTheme_Groupe->execute([$theme->id]);

		$delQuestion = $bdd->prepare("DELETE from question where id_theme = ?");
		$delQuestion->execute([$theme->id]);
		$DelResults = $bdd->prepare("DELETE from resultat where id_theme = ?");
		$DelResults->execute([$theme->id]);

		$DelExamPasser = $bdd->prepare("DELETE from quizz_passer where id_theme = ?");
		$DelExamPasser->execute([$theme->id]);
		$delRepEtudiant = $bdd->prepare("DELETE FROM reponses_etudiant where id_theme = ?");
		$delRepEtudiant->execute([$theme->id]);
		
	

	}
	$delTheme = $bdd->prepare("DELETE FROM theme where id_prof = ?");
	$delTheme->execute([$professeur->id]);
	$groupes = $bdd->prepare("SELECT * from groupe where id_prof = ?");
	$groupes->execute([$professeur->id]);
	while ($groupe = $groupes->fetch()) {
		echo 'ok';
		$delEtudiantGroupe = $bdd->prepare("DELETE FROM etudiant_groupe where id_groupe = ?");
		$delEtudiantGroupe->execute([$groupe->id]);
		# code...
	}
	$delGroupe = $bdd->prepare("DELETE FROM groupe where id_prof = ?");
	$delGroupe->execute([$professeur->id]);
	$delProfesseur = $bdd->prepare("DELETE from professeur where id = ?");
	$delProfesseur->execute([$id]);
		}
		header('Location:/Quizz/Professeurs.php');
	}