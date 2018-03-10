<?php

	require '../inc/bdd.php';
	session_start();
	if(isset($_SESSION["prof"]) && isset($_GET["id_groupe"]) && !empty($_GET["id_groupe"]) && isset($_GET["id_theme"]) && !empty($_GET["id_theme"])){
		$id_groupe = intval($_GET["id_groupe"]);
		$id_theme = intval($_GET["id_theme"]);
		$theme = $bdd->prepare("SELECT * FROM theme where id = ?");
		$theme->execute([$id_theme]);
		$theme = $theme->fetch();
		if($theme){
			$groupe_theme = $bdd->prepare("SELECT * FROM groupe_theme where id_theme = ? and id_groupe = ?");
			$groupe_theme->execute([$id_theme,$id_groupe]);

			$groupe_theme = $groupe_theme->fetch();
			if($groupe_theme){
					$questions = $bdd->prepare("SELECT * FROM question where id_theme = ?");
						 $questions->execute([$theme->id]);
						 $nbreponses = 0;
						 while($question = $questions->fetch()){
						 	
						 	$reponsenb =  $bdd->prepare("SELECT * from reponses where correct = 1 and id_question = ?");
							$reponsenb->execute([$question->id]);
							while($reponsen = $reponsenb->fetch()){
							
							if($reponsen->correct == 1){
								$nbreponses = $nbreponses + 1;

							 }
							}
							}
							
							$etudiant_groupe = $bdd->prepare("SELECT * FROM etudiant_groupe where id_groupe = ?");
				$etudiant_groupe->execute([$id_groupe]);

				while ($eg = $etudiant_groupe->fetch()) {
					$resultat = $bdd->prepare("SELECT * from resultat where id_theme =? and id_etudiant = ?");
					$resultat->execute([$theme->id,$eg->id_etudiant]);
					$resultat = $resultat->fetch();
					if($resultat){
						
						if($resultat->score >= ($nbreponses/2)){
							
						}
						else{
							$deleteReponseEtudiant =  $bdd->prepare("DELETE from reponses_etudiant where id_etudiant=? and id_theme = ?");
							$deleteReponseEtudiant->execute([$eg->id_etudiant,$theme->id]);
							$deleteQuizzPasser = $bdd->prepare("DELETE from quizz_passer where id_etudiant = ? and id_theme = ?");
								$deleteQuizzPasser->execute([$eg->id_etudiant,$theme->id]);

							$delResultat = $bdd->prepare("DELETE from resultat where id_etudiant = ? and id_theme = ?");
							$delResultat->execute([$eg->id_etudiant,$theme->id]);
						}
					}
				}
			}

		}
		header("Location:/Quizz/ResultatGroupe?id=".$id_groupe);

}