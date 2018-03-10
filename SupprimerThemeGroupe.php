<?php

session_start();
require '../inc/bdd.php';
if(isset($_SESSION["prof"]) && isset($_GET["id_theme"]) && !empty($_GET["id_theme"]) && isset($_GET["id_groupe"]) && !empty($_GET["id_groupe"])){
	$id_theme = intval($_GET["id_theme"]);
	$id_groupe = intval($_GET["id_groupe"]);
	$groupe_theme = $bdd->prepare("SELECT * from groupe_theme where id_theme = ? and id_groupe = ?");
	$groupe_theme->execute([$id_theme,$id_groupe]);
	$groupe_theme = $groupe_theme->fetch();
	if($groupe_theme){
		$DelResults = $bdd->prepare("DELETE from resultat where id_theme = ?");
		$DelResults->execute([$id_theme]);

		$DelExamPasser = $bdd->prepare("DELETE from quizz_passer where id_theme = ?");
		$DelExamPasser->execute([$id_theme]);
		$delRepEtudiant = $bdd->prepare("DELETE FROM reponses_etudiant where id_theme = ?");
		$delRepEtudiant->execute([$id_theme]);

		$delThemeGroupe = $bdd->prepare("DELETE from groupe_theme where id_theme = ? and id_groupe = ?");
		$delThemeGroupe->execute([$id_theme,$id_groupe]);
	
			}
				header("location:/Quizz/ListeGroupe.php"); 

}