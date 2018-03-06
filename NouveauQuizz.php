<?php
$title = "Nouveau Quizz";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["prof"])){
		if(isset($_POST["submit"]) && !empty($_POST)){
			$theme = $_POST["theme"];
			$ins = $bdd->prepare("INSERT INTO theme SET  nom = ?,id_prof=?");
			$ins->execute([$theme,$_SESSION["prof"]->id]);
			if($ins){
				$themes  = $bdd->query("SELECT id from theme");
				$themes	= $themes->fetchAll();
				echo count($themes);
				 $nb = $themes[count($themes)-1]->id;
				header("Location:NouveauQuestion.php?id=".$nb);
			}
		}

		require 'views/NouveauQuizz.view.php';
	}