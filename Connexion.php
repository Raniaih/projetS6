<?php
$title="Connexion";
require 'views/header.php';
require 'inc/bdd.php';
if(isset($_POST["submit"]) && !empty($_POST)){
	$email = $_POST["identifiant"];
	$password  = $_POST["motdepasse"];

	$req = $bdd->prepare("SELECT * FROM etudiant WHERE email=? AND motdepasse=?");
	$req->execute([$email,$password]);
	$user = $req->fetch();
	if($user){
		$_SESSION["etudiant"] = $user;
		header("location:/Quizz/index.php");


	}
	else{
		$req = $bdd->prepare("SELECT * FROM professeur WHERE email=? AND motdepasse=?");
		$req->execute([$email,$password]);
		$user = $req->fetch();
		if($user){
			$_SESSION["prof"] = $user;
			header("location:/Quizz/index.php");

		}
		else{
			$identi = $email;
			$_SESSION["flash"]["danger"] = "Identifiants incorrect ! ";

		}
		
	}
}

require 'views/connexion.view.php';
