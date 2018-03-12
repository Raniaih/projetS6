<?php $title = "Nouveau Etudiant";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["admin"])){
		if(isset($_POST["Valider"]) && !empty($_POST)){
			$nom = $_POST["nom"];
			$prenom = $_POST["prenom"];
			$email = $_POST["email"];
			$pwd1 = $_POST["password1"];
			$pwd2 = $_POST["password2"];
			$sexe = $_POST["sexe"];
			$nationalite = $_POST["nationalite"];
			$dn = $_POST["dn"];
			$niv = $_POST["niv"];
			$cin = $_POST["cin"];
			$cne  = $_POST["cne"];


			if($pwd2 == $pwd1){
				try {
					$ins = $bdd->prepare("INSERT INTO Etudiant set cin = ?, cne = ?, nom_elv = ?, prenom_elv = ?, date_naissance = ?, nationalite = ?, sexe = ?, nivetude = ?, email = ?, motdepasse = ? ");
					$ins->execute([$cin,$cne,$nom,$prenom,$dn,$nationalite,$sexe,$niv,$email,$pwd2]);
					if($ins){
						$_SESSION["flash"]["success"] = "Les données sont enregistrés par success";
					}
				} catch (Exception $e) {
					$_SESSION["flash"]["danger"] = "Un etudiant existe déjà avec l'email ".$email." !";
				}
			}
			else{
					$_SESSION["flash"]["danger"] = "Les deux mots de passe ne sont pas identique ! Veuillez reéssayer";
			}
		}
		require 'views/NouveauEtudiant.view.php';
	}