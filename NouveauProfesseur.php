<?php
$title = "Nouveau Professeur";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["admin"])){
		if(isset($_POST["Valider"]) && !empty($_POST)){
			$nom = $_POST["nom"];
			$prenom = $_POST["prenom"];
			$email = $_POST["email"];
			$resp = $_POST["resp"];
			$pwd1 = $_POST["password1"];
			$pwd2 = $_POST["password2"];
			if($pwd2 == $pwd1){
				try{
				$ins = $bdd->prepare("INSERT INTO Professeur set email = ?, motdepasse=?, nom_prof=?, prenom_prof = ?, responsable_matière = ? ");
				$ins->execute([$email,$pwd1,$nom,$prenom,$resp]);
				if($ins){
					$_SESSION["flash"]["success"] = "Les données sont enregistrés par success";
				}
				else{
					
				}
			}
			catch(Exception $e){
					$_SESSION["flash"]["danger"] = "Un professeur existe déjà ! l'email ".$email." est déjà utilisé pour un autre professeur";
			}
			}
			else{
				$_SESSION["flash"]["danger"] = "Les deux mots de passe ne sont pas identique ! Veuillez reéssayer";
			}
		}
		require("views/NouveauProfesseur.view.php");
	}