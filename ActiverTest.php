<?php
$title = "Activer/Desactiver Quizz";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["prof"]) && isset($_GET["id"])){
			$id_groupe  = intval($_GET["id"]);
			$groupe_theme = $bdd->prepare("SELECT * FROM groupe_theme where id_groupe = ?");
			$groupe_theme->execute([$id_groupe]);
			

			if(isset($_POST["valider"])){
				$id_theme = $_POST["quizz"];
				$theme_act = $bdd->prepare("SELECT * FROM groupe_theme where id_theme = ? and id_groupe = ?");
				$theme_act->execute([$id_theme,$id_groupe]);
				$theme_act = $theme_act->fetch();
				$status = 0;
				if($theme_act->status == 0){
					echo "ok";
					$status = 1;
				}
				$update = $bdd->prepare("UPDATE groupe_theme set status = ? where id_theme = ? and id_groupe = ?");
				$update->execute([$status,$id_theme,$id_groupe]);
				if($update){

					header("Location:ActiverTest.php?id=".$id_groupe);
				}
			}
				
				require 'views/ActiverTest.view.php';
			
		}
		?>