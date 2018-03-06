<?php
	$title = "Details du quizz";
	require 'views/header.php';
	require 'inc/bdd.php';
	if(isset($_SESSION["prof"]) && isset($_GET["id"]) && !empty($_GET["id"])){
		$id_theme = intval($_GET["id"]);

		$theme = $bdd->prepare("SELECT * from theme where id = ?");
		$theme->execute([$id_theme]);
		$theme = $theme->fetch();
		if($theme){
			$questions  = $bdd->prepare("SELECT * FROM question where id_theme = ?");
			$questions->execute([$id_theme]);

			require 'views/DetailsQuizz.view.php';
		}
	}