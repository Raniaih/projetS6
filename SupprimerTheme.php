<?php 
session_start();
require '../inc/bdd.php';
if(isset($_SESSION["prof"]) && isset($_GET["id"]) && !empty($_GET["id"])){
	$id = intval($_GET["id"]);
	$theme = $bdd->prepare("SELECT * FROM theme where id = ?");
	$theme->execute([$id]);
	$theme = $theme->fetch();

	if($theme){
		$questions = $bdd->prepare("SELECT * from question where id_theme=?");
		$questions->execute([$theme->id]);
		echo $questions->rowCount();
		while ($question = $questions->fetch()){
			echo 'ok';
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
		$DelExamPasser->execute([$id]);
		$delRepEtudiant = $bdd->prepare("DELETE FROM reponses_etudiant where id_theme = ?");
		$delRepEtudiant->execute([$id]);
		$delTheme = $bdd->prepare("DELETE FROM theme where id = ?");
		$delTheme->execute([$id]);
	header("location:/Quizz/ListeQuizz.php");

	}
}