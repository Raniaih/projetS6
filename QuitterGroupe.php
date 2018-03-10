<?php
	require '../inc/bdd.php';
	session_start();
	if( isset($_SESSION["etudiant"]) && isset($_GET["id"]) && !empty($_GET["id"])){
		$id_groupe = intval($_GET["id"]);
		$del = $bdd->prepare("DELETE FROM etudiant_groupe where id_etudiant = ? and id_groupe = ?");
		$del->execute([$_SESSION["etudiant"]->id,$id_groupe]);

		header("location:/Quizz/Groupes.php");
	}