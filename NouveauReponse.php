<?php $title = "Nouvelle reponse";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["prof"]) && isset($_GET["id"])){
		$id = intval($_GET["id"]);
		$question = $bdd->prepare("SELECT * FROM question where id = ?");
		$question->execute([$id]);
		$question = $question->fetch();
		if($question){
			if(isset($_POST["submit"]) && !empty($_POST["reponse"])){
				$checked = 0;
				$reponse = $_POST["reponse"];
				if(isset($_POST["correct"])){
					$checked  = 1;
				}
				$ins = $bdd->prepare("INSERT INTO reponses set id_question = ?, correct = ?, reponse = ?");
				$ins->execute([$question->id,$checked,$reponse]);
				if($ins){
					
				}
			}
			require 'views/NouveauReponse.view.php';
		}
	}