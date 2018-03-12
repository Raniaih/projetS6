<?php
$title = "La liste des professeurs";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["admin"])){
		
		$professeurs = $bdd->query("SELECT * FROM Professeur");
		require("views/Professeurs.view.php");
		}