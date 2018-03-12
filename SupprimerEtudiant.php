<?php 
	require '../inc/bdd.php';
	session_start();
	if(isset($_SESSION["admin"]) && isset($_GET["id"]) && !empty($_GET["id"])){
		$id = intval($_GET["id"]);
		$etudiant = $bdd->prepare("SELECT * FROM etudiant where id = ?");
		$etudiant->execute([$id]);
		$etudiant = $etudiant->fetch();
		
		if($etudiant){

			$delReponseEtudiant = $bdd->prepare("DELETE from reponses_etudiant where id_etudiant = ?");
			$delReponseEtudiant->execute([$etudiant->id]);
			$delQuizzPasser = $bdd->prepare("DELETE from quizz_passer where id_etudiant = ?");
			$delQuizzPasser->execute([$etudiant->id]);
			$delResultat = $bdd->prepare("DELETE from resultat where id_etudiant = ?");
			$delResultat->execute([$etudiant->id]);
			$delGroupeEtudiant = $bdd->prepare("DELETE from etudiant_groupe where id_etudiant = ?");
			$delGroupeEtudiant->execute([$etudiant->id]);
			$delEtudiant = $bdd->prepare("DELETE from etudiant where id = ?");
			$delEtudiant->execute([$id]);
			
			}
			header("Location:/Quizz/Etudiants.php");
	}