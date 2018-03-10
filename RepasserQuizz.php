<?php

	require '../inc/bdd.php';
	session_start();
	if(isset($_SESSION["prof"]) && isset($_GET["id_theme"]) && !empty($_GET["id_theme"]) && isset($_GET["id_etudiant"]) && !empty($_GET["id_etudiant"])){
		$id_theme = intval($_GET["id_theme"]);
		$id_etudiant = intval($_GET["id_etudiant"]);
		$deleteReponseEtudiant =  $bdd->prepare("DELETE from reponses_etudiant where id_etudiant=? and id_theme = ?");
		$deleteReponseEtudiant->execute([$id_etudiant,$id_theme]);
		$deleteQuizzPasser = $bdd->prepare("DELETE from quizz_passer where id_etudiant = ? and id_theme = ?");
		$deleteQuizzPasser->execute([$id_etudiant,$id_theme]);

		$delResultat = $bdd->prepare("DELETE resultat where id_etudiant = ? and id_theme = ?");
		$delResultat->execute([$id_etudiant,$id_theme]);
		header("Location:/Quizz/Consulter?id=".$id_etudiant);

}