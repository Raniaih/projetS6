<?php
require '../inc/bdd.php';
session_start();
if(isset($_GET["id_etudiant"]) && !empty($_GET["id_etudiant"]) && isset($_GET["id_groupe"]) && !empty($_GET["id_groupe"]) && isset($_SESSION["prof"])){
	$id_etudiant = intval($_GET["id_etudiant"]);
	$id_groupe = intval($_GET["id_groupe"]);

	$delete = $bdd->prepare("DELETE from etudiant_groupe where id_etudiant = ? AND id_groupe = ?");
	$delete->execute([$id_etudiant,$id_groupe]);

	header("location:/Quizz/ListeGroupe.php");
}