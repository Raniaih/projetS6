<?php $title = "Etudiants";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["prof"]) && isset($_GET["id"]) && !empty($_GET["id"])){
		$id = intval($_GET["id"]);
		$theme = $bdd->prepare("SELECT * FROM theme where id = ?");
		$theme->execute([$id]);
		$theme = $theme->fetch();
		if($theme){
		require 'views/NouveauQuestion.view.php';
		if(isset($_POST["submit"]) && !empty($_POST)){
			$question = str_replace("<br />", "<br/>", nl2br($_POST["question"]));
			$ins = $bdd->prepare("INSERT INTO question set question=?, id_theme=?");
			$ins->execute([$question,$theme->id]);
			if($ins){
				$questions = $bdd->query("SELECT id from question");
				$questions = $questions->fetchAll();
				$nb  = $questions[count($questions)-1]->id;
			
				header("Location:NouveauReponse.php?id=".$nb);
			}
		}
		}	
	}